let mix = require('laravel-mix');
let productionSourceMaps = false;

mix
  .js('assets/js/bundle.js', 'build/js')
  .js('assets/js/settings.js', 'build/js')
  .sass('assets/scss/style.scss', 'build/css')
  .sass('assets/scss/settings.scss', 'build/css')
  .browserSync("http://www.map-viewer.test")
  .sourceMaps(productionSourceMaps, 'source-map');