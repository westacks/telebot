import { defineConfig } from 'vitepress'
import { tabsMarkdownPlugin } from 'vitepress-plugin-tabs'
import llmstxt from 'vitepress-plugin-llms'
import { copyOrDownloadAsMarkdownButtons } from 'vitepress-plugin-llms'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: 'TeleBot',
  description: 'A modern Telegram bot framework',
  head: [
    ['link', { rel: 'icon', href: '/logo.svg' }]
  ],
  base: '/telebot/',
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    logo: '/logo.svg',

    nav: [
      { text: 'Home', link: '/' },
      { text: 'Documentation', link: '/installation' }
    ],

    sidebar: [
      {
        text: 'Getting Started',
        items: [
          { text: 'Installation', link: '/installation' },
          { text: 'Configuration', link: '/configuration' },
          { text: 'Objects', link: '/objects' },
          { text: 'Methods', link: '/methods' },
          { text: 'Handling Updates', link: '/updates' },
          { text: 'Testing', link: '/testing' },
          { text: 'Rate Limit', link: '/rate-limit' },
          { text: 'API Examples', link: '/api-examples' },
        ]
      },
      {
        text: 'Upgrade Guide',
        items: [
          { text: '3.x to 4.x', link: '/upgrade/3.x-4.x' },
        ]
      }
    ],

    socialLinks: [
      { icon: 'github', link: 'https://github.com/westacks/telebot' }
    ]
  },
  markdown: {
    config(md) {
      md.use(tabsMarkdownPlugin)
      md.use(copyOrDownloadAsMarkdownButtons)
    }
  },
  vite: {
    plugins: [
      llmstxt()
    ]
  }
})
