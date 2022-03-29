let mix = require('laravel-mix');

mix
  .sourceMaps()
  .js('assets/js/bundle.js', 'build/js')
  .sass('assets/scss/style.scss', 'build/css')
  .browserSync("http://www.map-viewer.test");