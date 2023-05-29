/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './index.html', './src/**/*.{js,ts,jsx,tsx}', '*.html', '*.php', '*.jsx', '*.blade.php',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

