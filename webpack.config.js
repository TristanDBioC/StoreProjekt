const path = require('path')

module.exports = {
  mode: 'development',
  entry: {
    index: './public/src/index.js'
  },
  output: {
    path: path.resolve(__dirname, 'public/bundles'),
    filename: '[name].js'
  },
  watch: true
}