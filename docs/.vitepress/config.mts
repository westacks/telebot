import { defineConfig } from 'vitepress'
import { tabsMarkdownPlugin } from 'vitepress-plugin-tabs'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: 'TeleBot',
  description: 'A modern Telegram bot framework',
  head: [
    ['link', { rel: 'icon', href: '/assets/logo.svg' }]
  ],
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    logo: '/assets/logo.svg',

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
          { text: 'Handling Updates', link: '/updates' }
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
    }
  }
})
