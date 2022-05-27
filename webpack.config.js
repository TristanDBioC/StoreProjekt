const path = require('path')

module.exports = {
  mode: 'development',
  entry: {
    index: './public/src/index.js',
    addproduct: './public/src/addproduct.js',
    product: '/public/src/product.js'
  },
  output: {
    path: path.resolve(__dirname, 'public/bundles'),
    filename: '[name].js'
  },
  watch: true
}