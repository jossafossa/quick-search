let mix = require('laravel-mix');

mix
  .sourceMaps()
  .js('assets/js/bundle.js', 'build/js')
  .js('assets/js/settings.js', 'build/js')
  .sass('assets/scss/style.scss', 'build/css')
  .sass('assets/scss/settings.scss', 'build/css')
  .browserSync("http://www.map-viewer.test");