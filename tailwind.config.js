/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/*.{html,js,php}",
    "./dist/*",
    "./dist/index.php",
    "./views/*.{html,js,php}",
    "./models/*.{html,js,php}",
    "./controller/*.{html,js,php}"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}