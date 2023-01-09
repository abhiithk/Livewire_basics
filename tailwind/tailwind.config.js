/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./reg/**/*.{html,php}"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};
