module.exports = {
  configureWebpack: config => {
    config.output.filename = '[name].js';
    config.optimization.splitChunks = false
    config.plugins[5].options.filename = "[name].css"
  },
  devServer: {
    inline: false // https://webpack.js.org/configuration/dev-server/#devserver-inline
  }
}