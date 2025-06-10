<?php

namespace WeStacks\TeleBot\Generator;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;
use Doctrine\Inflector\InflectorFactory;

class Scrapper
{
    public static function scrap(): void
    {
        $data = static::data();
        file_put_contents(__DIR__.'/../api.min.json', json_encode($data));
        file_put_contents(__DIR__.'/../api.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    public static function data(): array
    {
        $data = (new HttpBrowser())
            ->request('GET', $url = 'https://core.telegram.org/bots/api')
            ->filter('#dev_page_content');

        $releaseTag = $data->filter('h4')->first();
        $version = $data->filter('p > strong')->first()->text();

        $result = [
            'version' => $version,
            'release_date' => $releaseTag->text(),
            'methods' => [],
            'types' => [],
        ];

        $currentType = $currentName = '';

        $data->children()->each(function (Crawler $x) use (&$result, &$currentType, &$currentName, $url) {
            // New category, clear name and type
            if (in_array($x->nodeName(), ['h3', 'hr'])) {
                $currentType = '';
                $currentName = '';
            }

            if ($x->nodeName() === 'h4') {
                $a = $x->filter('a');
                $name = $a->attr('name');

                if ($name && strpos($name, '-') !== false) {
                    $currentName = '';
                    $currentType = '';

                    return;
                }

                $currentType = ctype_upper($x->text()[0]) ? 'types' : 'methods';
                $currentName = $x->text();

                if (! isset($result[$currentType][$currentName])) {
                    $result[$currentType][$currentName] = [];
                }

                if ($href = $a->attr('href')) {
                    $result[$currentType][$currentName]['href'] = $url.$href;
                }

                return;
            }

            if (! $currentType || ! $currentName) {
                return;
            }

            if ($x->nodeName() === 'p') {
                $result[$currentType][$currentName]['description'][] = $x->text();
            }

            if ($x->nodeName() === 'table') {
                $keys = $x->filter('tr')->first()->filter('th')->each(fn (Crawler $n) => $n->text());

                $values = $x->filter('tr')->each(
                    fn (Crawler $n) => $n->filter('td')->each(fn (Crawler $n) => $n->text())
                );

                $fields = array_values(array_map(
                    fn ($n) => static::prepareFieldData($keys, $n),
                    array_filter($values)
                ));

                $keys = array_map(fn (array $field) => $field['parameter'] ?? $field['field'], $fields);
                $fields = array_map(function (array $field) {
                    unset($field['parameter'], $field['field']);

                    return $field;
                }, $fields);

                $result[$currentType][$currentName][$currentType === 'methods' ? 'parameters' : 'fields'] = array_combine($keys, $fields);

                // Crutch for InputMedia
                if (isset($result[$currentType][$currentName]['extends']) && $result[$currentType][$currentName]['extends'] === 'InputMedia') {
                    array_unshift($result[$currentType][$currentName]['fields']['media']['type'], 'InputFile');
                }
            }

            if ($x->nodeName() === 'ul') {
                $x->children('li > a')->each(function (Crawler $n) use (&$result, $currentType, $currentName) {
                    $result[$currentType][$currentName]['subtypes'][] = $type = $n->text();
                    $result[$currentType][$type]['extends'] = $currentName;
                });
            }

            if ($currentType === 'methods' && isset($result[$currentType][$currentName]['description'])) {
                $description = implode(PHP_EOL, $result[$currentType][$currentName]['description']);

                if (preg_match('/(?:on success,)([^.]*)/i', $description, $match)) {
                    static::extractReturnTypes($currentType, $currentName, trim($match[1]), $result);
                } elseif (preg_match('/(?:returns)([^.]*)(?:on success)?/i', $description, $match)) {
                    static::extractReturnTypes($currentType, $currentName, trim($match[1]), $result);
                } elseif (preg_match('/([^.]*)(?:is returned)/i', $description, $match)) {
                    static::extractReturnTypes($currentType, $currentName, trim($match[1]), $result);
                }
            }
        });

        return $result;
    }

    protected static function prepareFieldData(array $keys, array $data): array
    {
        $data = array_change_key_case(array_combine($keys, $data));

        if (isset($data['type'])) {
            $data['type'] = static::cleanType($data['type']);
        }

        if (isset($data['required'])) {
            $data['required'] = $data['required'] === 'Yes';
        }

        return $data;
    }

    protected static function extractReturnTypes($currentType, $currentName, $return, &$items): void
    {
        if (preg_match("/(?:array of )+(\w*)/i", $return, $match)) {
            $inflector = InflectorFactory::create()->build();
            $ret = static::cleanType($match[1]);
            $rets = array_map(fn ($r) => "Array<".$inflector->singularize($r).">", $ret);
            $items[$currentType][$currentName]['returns'] = $rets;
        } else {
            $words = explode(' ', $return);
            $rets = [];
            foreach ($words as $ret) {
                $cleaned_ret = static::cleanType(preg_replace('/[^a-zA-Z0-9]/', '', $ret));
                foreach ($cleaned_ret as $r) {
                    if (ctype_upper($ret[0])) {
                        $rets[] = $r;
                    }
                }
            }
            $items[$currentType][$currentName]['returns'] = $rets;
        }
    }

    protected static function cleanType(string $type): array
    {
        if ($isArray = (strpos($type, 'Array of ') === 0)) {
            $type = substr($type, strlen('Array of '));
        }

        $fixed_ors = array_map('trim', explode(' or ', $type));
        $fixed_ands = [];
        foreach ($fixed_ors as $fo) {
            $fixed_ands = array_merge($fixed_ands, array_map('trim', explode(' and ', $fo)));
        }
        $fixed_commas = [];
        foreach ($fixed_ands as $fa) {
            $fixed_commas = array_merge($fixed_commas, array_map('trim', explode(', ', $fa)));
        }

        $result = array_map(fn (string $x) => $isArray ? 'Array<'.static::cleanType($x)[0].'>' : $x, $fixed_commas);

        // Crutch for InputMedia
        if (in_array('Array<InputMediaAudio>', $result)) {
            return ['Array<InputMedia>'];
        }

        return $result;
    }
}
