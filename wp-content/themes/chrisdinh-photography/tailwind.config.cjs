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
      padding: {},
      blur: {
        xs: '2px'
      }
    },
  },
  plugins: [],
};
