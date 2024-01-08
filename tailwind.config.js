/** @type {import('tailwindcss').Config} */
module.exports = {
  // content: ["./Public/pages/**/*.{html,js,php}"],
  content: [
    "./resources/views/*.php",
    "./js/custom.min.js",
  ],

  "tailwindCSS.includeLanguages": {
    plaintext: "php",
  },

  plugins: [],
  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
      },
      colors :{
        'primary' :{
          100: '#0D4B33',
          200: '#052519'
        } ,
        'orange' : '#FB6109',

      }
    },
  },
};
