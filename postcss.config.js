const purgecss = require('@fullhuman/postcss-purgecss');
const cssnano = require('cssnano');

module.exports = {
  plugins: [
    require('tailwindcss'),
	require('postcss-import'),
	process.env.NODE_ENV === 'production' ? require('autoprefixer') : null,
    process.env.NODE_ENV === 'production'
      ? cssnano({ preset: 'default' })
      : null,
    purgecss({
      content: ['./**/*.php', './js/**/*.js'],
      defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
    })
  ]
}

// module.exports = {
// 	plugins: [
// 		require('tailwindcss'),
// 		require('postcss-import'),
// 		require('autoprefixer')
// 	]
// }
