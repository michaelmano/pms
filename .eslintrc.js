module.exports = {
  parserOptions: {
    parser: 'babel-eslint',
  },
  extends: ['airbnb-base', 'plugin:vue/recommended'],
  plugins: ['vue'],
  "import/no-extraneous-dependencies": [
    error,
    {
      devDependencies: ["resources/assets/js/tests/**/*.spec.js"]
    }
  ],
};
