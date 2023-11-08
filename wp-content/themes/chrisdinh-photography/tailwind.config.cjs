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
      padding: {
        '1/2': '50%',
        full: '100%',
      },
      blur: {
        xs: '2px'
      }
    },
  },
  plugins: [],
};
