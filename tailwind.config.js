/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        "primary": "#ff6400",
        "primary-lighter": "#ffd1b3",
        "primary-darker": "#f85c05",
        "primary-transparent": "#ff640033", //20%
        "lighter": "#f5f5f5",
        "light": "#e5e5e5",
        "medium": "#a3a3a3",
        "dark": "#525252",
        "darker": "#262626",
      },
      fontFamily: {
        'display': '"FrancoisOne", "Franklin Gothic", "Trebuchet MS"',
        'body': '"Poppins", "Verdana", "Lucida Grande", Arial, sans-serif',
      },
      screens: {
        'xs': '480px',
        'xl': '1200px',
      },
    },
  },
}

