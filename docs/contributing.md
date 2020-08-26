# Contributing

---

Contributions are welcome and will be fully credited.

We accept contributions via Pull Requests on [Github](https://github.com/westacks/php-telebot-sdk). Please review these guidelines before submitting any pull requests.

## Guidelines

---

- **Code readability.** Be sure you are not turning a project to a mess. Refactor requests are welcome. Follow at least some [PHP Standards Recommendations](https://www.php-fig.org/psr/).
- **KISS.** The main goal of this library is to follow this principle (see [details](https://en.wikipedia.org/wiki/KISS_principle)). Unnecessary features will not be added to the library.
- **New features should be tested.** If your pull request adds a new feature to the project, be sure to provide unit tests to "Feature" test suite (see PHPUnit [config file](https://github.com/westacks/php-telebot-sdk/blob/master/phpunit.xml.dist)). We do not measure code coverage, but at least basic usage workflows should be tested.
- **Rebase.** You may also need to [rebase](http://git-scm.com/book/en/Git-Branching-Rebasing) to avoid merge conflicts.
- **One pull request per feature.** Things much easier to test if they are separate.

## Running tests

---
Create a local PHPUnit config:
```bash
cp phpunit.xml.dist phpunit.xml
```

Add your env variables to your local `phpunit.xml`:
```xml
<php>
    <env name="TELEGRAM_BOT_TOKEN" value="123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11" force="true"/>
    <env name="TELEGRAM_USER_ID" value="1234567890" force="true"/>
</php>
```

Run tests:
```bash
composer test
```

---

Happy coding =)