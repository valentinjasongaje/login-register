/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./views/**/*.{html,js,php}",
    "./views/home.php",
    "./models/**/*.{html,js,php}",
    "./controller/**/*.{html,js,php}"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}