/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./views/**/*.{html,js,php}",
    "index.php",
    "./models/**/*.{html,js,php}",
    "./controller/**/*.{html,js,php}"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}