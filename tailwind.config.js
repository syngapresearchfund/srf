const colors = require('tailwindcss/colors');

module.exports = {
	purge: ['./**.php', './**/**.php'],
	darkMode: false, // or 'media' or 'class'
	theme: {
		extend: {
			colors: {
				orange: colors.orange,
				teal: colors.teal,
				sky: colors.sky,
			},
			fontFamily: {
				ebg: ['EB Garamond', 'serif'],
				oswald: ['Oswald', 'sans-serif'],
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [require('@tailwindcss/typography'), require('@tailwindcss/line-clamp')],
};
