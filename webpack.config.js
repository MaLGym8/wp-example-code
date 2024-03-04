const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const webpack = require('webpack');

const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = {
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'assets'),
    filename: 'bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.(scss|sass)$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: ['css-loader', 'sass-loader'],
        })
      },
      {
        test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        exclude: /node_modules/,
        loader: "url-loader?limit=10000&mimetype=application/font-woff&name=fonts/[name].[ext]"
      },
      {
        test: /\.(ttf|eot)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        exclude: /node_modules/,
        loader: "file-loader?name=fonts/[name].[ext]"
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        exclude: /node_modules/,
        loader: 'file-loader?name=img/[name].[ext]'
      },
      {
        test: /\.html$/,
        exclude: /node_modules/,
        loader: 'html-loader'
      },
      {
        test: /\.css$/,
        loader: 'css-loader',
      },
    ]
  },
  plugins: [
    new ExtractTextPlugin('main.css'),
    new CleanWebpackPlugin(['assets']),
    new OptimizeCssAssetsPlugin({
      assetNameRegExp: /\.css$/g,
      cssProcessor: require('cssnano'),
      cssProcessorPluginOptions: {
        preset: ['default', { discardComments: { removeAll: true } }],
      },
      canPrint: true
    })
  ]
};
