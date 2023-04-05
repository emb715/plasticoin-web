/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#00567A',
        secondary: '#0098BF',
      },
      maxWidth: {
        '64': '16rem',
      }
    },
  },
  plugins: [],
}