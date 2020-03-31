const mix = require('laravel-mix');
const { resolve } = require('path')

mix
  .webpackConfig({
    resolve: {
      extensions: ['.js', '.vue', '.json'],
      alias: {
        '@': resolve(__dirname, 'resources/js')
      },
    },
  })
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
	  require('tailwindcss')
	]);
