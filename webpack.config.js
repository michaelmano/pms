const path = require('path');

const CopyWebpackPlugin = require('copy-webpack-plugin');
const { VueLoaderPlugin } = require('vue-loader');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

function resolve(dir) {
  return path.join(__dirname, './', dir);
}

module.exports = {
  mode: process.env.NODE_ENV,
  resolve: {
    alias: {
      vue: 'vue/dist/vue.js',
      axios: 'axios/dist/axios.js',
    },
  },
  entry: ['./resources/assets/entry.js'],
  output: {
    path: resolve('./public/'),
    filename: 'js/app.js',
  },
  module: {
    rules: [
      {
        test: /\.(png|jp(e*)g)$/,
        loader: 'url-loader'
      },
      {
        test: /\.(svg)$/,
        loader: 'svg-inline-loader'
      },
      {
        test: /\.(css|sass|scss)$/,
        use: ['vue-style-loader', MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
      },
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: 'babel-loader',
        },
      },
      {
        test: /\.vue$/,
        use: ['vue-loader'],
      },
    ],
  },
  plugins: [
    new VueLoaderPlugin(),
    new MiniCssExtractPlugin({ filename: 'css/app.css' }),
    new BrowserSyncPlugin({
      proxy: { target: `${__dirname.split('/').pop(-1)}.test` }, // folder-name.test
      port: 3000,
    }),
    new CopyWebpackPlugin([
      {
        from: resolve('resources/assets/images'),
        to: resolve('public/images'),
        toType: 'dir',
      },
      {
        from: resolve('resources/assets/icons'),
        to: resolve('public/icons'),
        toType: 'dir',
      },
    ]),
  ],
};
