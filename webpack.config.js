const path = require('path');
const webpack = require('webpack');
const TerserPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const globImporter = require('node-sass-glob-importer');
const excludeNodeModulesExcept = require('babel-loader-exclude-node-modules-except');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

const { NODE_ENV, DASHBOARD } = process.env;
const isProduction = NODE_ENV === 'production';
const withDashboard = !!DASHBOARD;
const src = './s1/local/templates/main';

const DashboardPlugin = withDashboard ? require('webpack-dashboard/plugin') : null;

module.exports = {
  mode: isProduction ? NODE_ENV : 'development',
  entry: {
    ['default']: [
      `${src}/scss/init.scss`,
      `${src}/js/init.js`
    ]
  },
  output: {
    path: path.resolve(__dirname, `${src}/build`),
    filename: '[name].js'
  },
  devtool: isProduction ? false : 'source-map',
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      'vue$': 'vue/dist/vue.esm.js',
      '@': path.resolve(__dirname, src),
    }
  },
  module: {
    rules: [
      isProduction ? {} : {
        test: /\.(js|vue)$/,
        exclude: /node_modules/,
        loader: 'eslint-loader',
        enforce: 'pre',
        options: {
          formatter: require('eslint-formatter-friendly'),
          emitWarning: true
        }
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader',
      },
      {
        test: /\.js$/,
        use: {
          loader: 'babel-loader',
          options: {
            cacheDirectory: true,
          }
        },
        exclude: excludeNodeModulesExcept(['swiper', 'dom7'])
      },
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: '../',
              sourceMap: !isProduction
            },
          },
          'css-loader?-url',
          'postcss-loader',
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              sassOptions: {
                importer: globImporter()
              }
            }
          },
        ],
      },
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css'
    }),
    withDashboard ? new DashboardPlugin() : () => {},
    new VueLoaderPlugin(),
  ],
  optimization: {
    splitChunks: {
      cacheGroups: {
        styles: {
          test: /\.css$/,
          chunks: 'all',
          enforce: true
        },
        vendor: {
          test: /[\\/]node_modules[\\/]/,
          name: 'vendor',
          chunks: 'initial',
          enforce: true
        },
      }
    },
  },
  stats: {
    colors: true,
    children: false,
    hash: false,
    version: false,
    entrypoints: false,
  },
  performance: {
    maxEntrypointSize: 512000,
    maxAssetSize: 512000
  }
};

if (isProduction) {
  module.exports.plugins = (module.exports.plugins || []).concat([
    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: '"production"'
      }
    }),
    new TerserPlugin({
      exclude: /vendor/,
      terserOptions: {
        output: {
          comments: false,
        },
      },
      extractComments: false,
    }),
    new OptimizeCssAssetsPlugin({
      cssProcessorPluginOptions: {
        preset: ['default', {
          discardComments: {removeAll: true},
          mergeLonghand: false,
          mergeRules: false,
        }]
      }
    }),
  ])
}
