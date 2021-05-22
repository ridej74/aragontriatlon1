module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    container: {
      center: true,
    },
    extend: {}
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
