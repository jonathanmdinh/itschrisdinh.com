// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}'
  ],
  theme: {
    extend: {
      fontFamily: {
        logo: ['adobe-handwriting-ernie', 'Helvetica-Neue', 'sans-serif'],
      },
      colors: {
        black: '#000',
        white: '#fff',
        grey: '#999999',
      }, // Extend Tailwind's default colors,
      screens: {
        sm: '320px',
        md: '768px',
        lg: '1030px',
        xl: '1440px'
      },
      gridTemplateColumns: {
        'gallery': 'repeat(4, 300px)'
      },
      gridTemplateRows: {
        'gallery': 'repeat(auto-fill, 300px)'
      },
      padding: {},
      blur: {
        xs: '2px'
      },
      zIndex: {
        1: 1
      }
    },
    fontFamily: {
      handwritingErnie: ['adobe-handwriting-ernie', 'Helvetica-Neue', 'sans-serif'],
      neueHaas: ['neue-haas-grotesk-display', 'Helvetica-Neue', 'sans-serif']
    }
  },
  plugins: [],
  safelist: [
    'sm:hidden',
    'md:hidden',
    'lg:hidden',
    'sm:block',
    'md:block',
    'lg:block',
  ]
};
