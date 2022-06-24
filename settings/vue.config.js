module.exports = {
  configureWebpack: config => {
    config.output.filename = '[name].js';
    // console.log(config);
    // console.log(config.plugins[5]);
    config.optimization.splitChunks = false
    config.plugins[5].options.filename = "[name].css"
  }
}