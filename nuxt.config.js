import shrinkRay from 'shrink-ray-current'

import { BASE_URL, STACK_DOMAIN } from './plugins/baseUrl'

const LOCALES = [
  {
    code: 'en',
    name: 'English',
    iso: 'en', // Will be used as catchall locale by default.
  },
  {
    code: 'de',
    name: 'Deutsch',
    iso: 'de',
  },
]

export default {
  build: {
    babel: {
      plugins: [
        ['@babel/plugin-proposal-private-property-in-object', { loose: true }], // https://stackoverflow.com/a/68695763/4682621
      ],
      presets({ _isServer }) {
        return [['@nuxt/babel-preset-app', { corejs: { version: 3 } }]]
      },
    },
    extend(_config, _ctx) {},
    extractCSS: true,
    transpile: [/\.mjs$/],
  },
  buildModules: [
    // https://go.nuxtjs.dev/typescript
    '@nuxt/typescript-build',
    '@nuxtjs/composition-api/module',
    '@nuxtjs/google-analytics',
    '@nuxtjs/html-validator',
    ['@nuxtjs/moment', { locales: ['de'] }],
    // https://go.nuxtjs.dev/stylelint
    '@nuxtjs/stylelint-module',
    // https://go.nuxtjs.dev/tailwindcss
    '@nuxtjs/tailwindcss',
  ],
  components: true,

  // Global page headers: https://go.nuxtjs.dev/config-head
  head() {
    return {
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
  generate: {
    interval: 2000, // https://github.com/nuxt-community/composition-api/issues/44
  },
  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    [
      'nuxt-helmet',
      {
        hsts: {
          maxAge: 31536000,
          preload: true,
        },
      },
    ], // Should be declared at the start of the array.
    'nuxt-healthcheck',
    '@nuxt/http',
    [
      '@nuxtjs/i18n',
      {
        baseUrl: BASE_URL,
        defaultLocale: 'en', // Must be set for the default prefix_except_default prefix strategy.
        detectBrowserLanguage: {
          cookieSecure: true,
          redirectOn: 'root',
        },
        locales: LOCALES,
        vueI18n: {
          // messages: {
          //   de: localeDe,
          //   en: localeEn,
          // },
          silentFallbackWarn: true,
        },
        vueI18nLoader: true,
      },
    ],
    [
      '@nuxtjs/robots',
      {
        Allow: ['/'],
        Disallow: ['/robots.txt'], // https://webmasters.stackexchange.com/a/117537/70856
        Sitemap: BASE_URL + '/sitemap.xml',
      },
    ],
    ['@nuxtjs/sitemap', { hostname: BASE_URL, i18n: true }], // Should be declared at the end of the array.
  ],
  plugins: ['~/plugins/baseUrl.ts', '~/plugins/i18n.ts'],
  publicRuntimeConfig: {
    googleAnalytics: {
      id: process.env.GOOGLE_ANALYTICS_ID,
      debug: process.env.NODE_ENV !== 'production',
    },
  },
  render: {
    compressor: shrinkRay(),
    csp: {
      policies: {
        'base-uri': ["'none'"], // Mozilla Observatory.
        'connect-src': [
          `https://*.${STACK_DOMAIN}`,
          'https://www.google-analytics.com',
        ],
        'default-src': ["'none'"],
        // 'font-src': ["'self'"],
        'form-action': ["'none'"], // Mozilla Observatory.
        'frame-ancestors': ["'none'"], // Mozilla Observatory.
        'img-src': [
          'data:',
          `https://*.${STACK_DOMAIN}`,
          'https://www.google-analytics.com',
          "'self'",
        ],
        'manifest-src': ["'self'"], // Chrome
        'report-uri': 'https://dargmuesli.report-uri.com/r/d/csp/enforce',
        'script-src': [
          "'self'",
          'https://static.cloudflareinsights.com/beacon.min.js',
          'https://www.google-analytics.com/analytics.js',
        ],
        'style-src': ["'self'"], // Tailwind
      },
      reportOnly: false,
    },
  },
  target: 'static',
  vue: {
    config: {
      productionTip: false,
    },
  },
}
