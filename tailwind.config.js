const defaultTheme = require('tailwindcss/defaultTheme')

function heading(theme) {
  return {
    fontWeight: theme('fontWeight.bold'),
    overflow: 'hidden',
    textOverflow: 'ellipsis',
  }
}

module.exports = {
  mode: 'jit',
  plugins: [
    require('@tailwindcss/typography'),
    function ({ addBase, theme }) {
      addBase({
        h1: {
          ...heading(theme),
          fontSize: theme('fontSize.4xl'),
          textAlign: 'center',
        },
        h2: {
          ...heading(theme),
          fontSize: theme('fontSize.3xl'),
        },
        h3: {
          ...heading(theme),
          fontSize: theme('fontSize.2xl'),
        },
        h4: {
          ...heading(theme),
          fontSize: theme('fontSize.xl'),
        },
        h5: {
          ...heading(theme),
          fontSize: theme('fontSize.lg'),
        },
        h6: {
          ...heading(theme),
        },
      })
    },
  ],
  theme: {
    extend: {
      colors: {
        link: defaultTheme.colors.blue['700'],
      },
      screens: {
        12: { raw: '(min-aspect-ratio: 2/1)' },
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            a: {
              color: theme('colors.link'),
              textDecoration: 'none',
            },
          },
        },
        xl: {
          css: {
            h1: {
              lineHeight: theme('lineHeight.snug'),
            },
            h2: {
              lineHeight: theme('lineHeight.snug'),
            },
            h3: {
              lineHeight: theme('lineHeight.snug'),
            },
            h4: {
              lineHeight: theme('lineHeight.snug'),
            },
            h5: {
              lineHeight: theme('lineHeight.snug'),
            },
            h6: {
              lineHeight: theme('lineHeight.snug'),
            },
          },
        },
      }),
    },
  },
}
