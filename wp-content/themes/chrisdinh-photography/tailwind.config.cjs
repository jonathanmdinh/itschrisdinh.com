// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}'
  ],
  theme: {
    extend: {
      colors: {
        black: '#000',
        white: '#fff',
        grey: '#999999',
      }, // Extend Tailwind's default colors,
      screens: {
        sm: '320px',
        md: '768px',
        lg: '1024px',
        xl: '1440px'
      },
      gridTemplateColumns: {
        'gallery': 'repeat(4, 300px)'
      },
      gridTemplateRows: {
        'gallery': 'repeat(4, 300px)'
      },
      padding: {},
      blur: {
        xs: '2px'
      }
    },
    fontFamily: {
      handwritingErnie: ['adobe-handwriting-ernie', 'Helvetica-Neue', 'sans-serif'],
      neueHaas: ['neue-haas-grotesk-display', 'Helvetica-Neue', 'sans-serif']
    }
  },
  plugins: [],
  safelist: [
    {
      pattern: /(md\:|lg\:|)-(grid-cols-gallery|grid-rows-gallery)/
    }
  ]
};
