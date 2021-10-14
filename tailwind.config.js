const colors = require('tailwindcss/colors');

module.exports = {
	purge: ['./**.php', './**/**.php'],
	darkMode: false, // or 'media' or 'class'
	theme: {
		extend: {
			typography: {
				DEFAULT: {
					css: {
						img: false,
						// img: { margin: '0' },
						// 'pre code': false,
						// 'code::before': false,
						// 'code::after': false
					},
				},
				xl: {
					css: {
						img: false,
						// img: { margin: '0' },
						// 'pre code': false,
						// 'code::before': false,
						// 'code::after': false
					},
				},
			},
			colors: {
				orange: colors.orange,
				teal: colors.teal,
				sky: colors.sky,
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [require('@tailwindcss/typography')],
};
