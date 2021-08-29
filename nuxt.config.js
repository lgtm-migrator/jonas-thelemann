export default {
  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',

  // Global page headers: https://go.nuxtjs.dev/config-head
  head() {
    return {
      htmlAttrs: {
        lang: 'en'
      },
      link: [
        {
          href: '/assets/static/favicon/apple-touch-icon.png?v=bOXMwoKlJr',
          rel: 'apple-touch-icon',
          sizes: '180x180',
        },
        // {
        //   href: '/assets/static/favicon/favicon-16x16.png?v=bOXMwoKlJr',
        //   rel: 'icon',
        //   sizes: '16x16',
        //   type: 'image/png',
        // },
        // {
        //   href: '/assets/static/favicon/favicon-32x32.png?v=bOXMwoKlJr',
        //   rel: 'icon',
        //   sizes: '32x32',
        //   type: 'image/png',
        // },
        {
          href: '/assets/static/favicon/favicon.ico',
          rel: 'icon',
          type: 'image/x-icon',
        },
        {
          href: '/assets/static/favicon/site.webmanifest?v=bOXMwoKlJr',
          rel: 'manifest',
        },
        {
          color: '#ee976e',
          href: '/assets/static/favicon/safari-pinned-tab.svg?v=bOXMwoKlJr',
          rel: 'mask-icon',
        },
        {
          href: '/assets/static/favicon/favicon.ico?v=bOXMwoKlJr',
          rel: 'shortcut icon',
        },
      ],
      meta: [
        { charset: 'utf-8' },
        { content: 'width=device-width, initial-scale=1', name: 'viewport' },
        {
          hid: 'description',
          name: 'description',
          property: 'description',
          content: 'Portfolio von Jonas Thelemann.',
        },
        {
          hid: 'og:description',
          property: 'og:description',
          content: 'Portfolio von Jonas Thelemann.',
        },
        {
          content: '/assets/static/favicon/browserconfig.xml?v=bOXMwoKlJr',
          name: 'msapplication-config',
        },
        {
          content: '#ee976e',
          name: 'msapplication-TileColor',
        },
        {
          content: '#ee976e',
          name: 'theme-color',
        },
        // {
        //   hid: 'og:image',
        //   property: 'og:image',
        //   content:
        //     this.$baseUrl +
        //     '/assets/static/logos/maevsi_with-text_open-graph.png', // Does not support .svg as of 2021-06.
        // },
        // // {
        //   hid: 'og:image:alt',
        //   property: 'og:image:alt',
        //   content: this.$t('globalOgImageAlt'),
        // },
        // {
        //   hid: 'og:image:height',
        //   property: 'og:image:height',
        //   content: '627',
        // },
        // {
        //   hid: 'og:image:width',
        //   property: 'og:image:width',
        //   content: '1200',
        // },
        {
          hid: 'og:site_name',
          property: 'og:site_name',
          content: 'Jonas Thelemann',
        },
        {
          hid: 'og:type',
          property: 'og:type',
          content: 'website', // https://ogp.me/#types
        },
        {
          hid: 'og:title',
          property: 'og:title',
          content: 'Jonas Thelemann',
        },
        // {
        //   hid: 'og:url',
        //   property: 'og:url',
        //   content:
        //     'https://' +
        //     (process.env.NUXT_ENV_STACK_DOMAIN || 'jonas-thelemann.test') +
        //     this.$route.path,
        // },
        {
          hid: 'twitter:card',
          property: 'twitter:card',
          content: 'summary',
        },
        {
          hid: 'twitter:description',
          property: 'twitter:description',
          content: 'Portfolio von Jonas Thelemann.',
        },
        // {
        //   hid: 'twitter:image',
        //   property: 'twitter:image',
        //   content:
        //     this.$baseUrl +
        //     '/assets/static/logos/maevsi_with-text_open-graph.png', // Does not support .svg as of 2021-06.
        // },
        // {
        //   hid: 'twitter:image:alt',
        //   property: 'twitter:image:alt',
        //   content: this.$t('globalOgImageAlt'),
        // },
        // TODO: Get access to the @maevsi handle.
        // {
        //   hid: 'twitter:site',
        //   property: 'twitter:site',
        //   content: '@maevsi',
        // },
        // {
        //   hid: 'twitter:title',
        //   property: 'twitter:title',
        //   content: 'maevsi',
        // },
      ],
      title: 'Jonas Thelemann',
    }
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  generate: {
    // https://github.com/nuxt-community/composition-api/issues/44
    interval: 2000,
  },

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/typescript
    '@nuxt/typescript-build',
    '@nuxtjs/composition-api/module',
    ['@nuxtjs/moment', { locales: ['de'] }],
    // https://go.nuxtjs.dev/stylelint
    '@nuxtjs/stylelint-module',
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxt/http'
  ],

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    babel:{
      plugins: [
        ['@babel/plugin-proposal-private-property-in-object', { loose: true }] // https://stackoverflow.com/a/68695763/4682621
      ]
    }
  }
}
