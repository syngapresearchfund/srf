const colors = require('tailwindcss/colors');
const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

module.exports = {
	purge: ['./**.php', './**/**.php'],
	darkMode: false, // or 'media' or 'class'
	theme: {
		extend: {
			colors: {
				orange: colors.orange,
				teal: colors.teal,
				sky: colors.sky,
				'srf-purple': {
					100: '#d0b0e3',
					200: '#b98bd5',
					300: '#a366c7',
					400: '#8b43b7',
					500: '#6f3592',
					600: '#612e7f',
					700: '#53276d',
					800: '#44215a',
					900: '#361a47',
				},
				'srf-blue': {
					100: '#d0dcef',
					200: '#aac0e2',
					300: '#84a3d5',
					400: '#5e87c8',
					500: '#3e6cb5',
					600: '#3761a2',
					700: '#31558f',
					800: '#2a4a7c',
					900: '#243f69',
				},
				'srf-green': {
					100: '#a1f2cc',
					200: '#75ebb4',
					300: '#48e59c',
					400: '#1fdb84',
					500: '#19ae69',
					600: '#16985c',
					700: '#13814e',
					800: '#0f6b41',
					900: '#0c5533',
				},
			},
			fontFamily: {
				ebg: ['EB Garamond', 'serif'],
				poppins: ['Poppins', 'sans-serif'],
				sans: ['Poppins', ...defaultTheme.fontFamily.sans],
				serif: ['"EB Garamond"', ...defaultTheme.fontFamily.serif],
			},
		},
	},
	variants: {
		extend: {
			backgroundOpacity: ['even'],
			borderRadius: ['first', 'last'],
		},
	},
	plugins: [
		require('@tailwindcss/typography'),
		require('@tailwindcss/line-clamp'),
		plugin(function ({ addBase, theme }) {
			addBase({
				h1: { fontFamily: theme('fontFamily.sans') },
				h2: { fontFamily: theme('fontFamily.sans') },
				h3: { fontFamily: theme('fontFamily.sans') },
				h4: { fontFamily: theme('fontFamily.sans') },
				h5: { fontFamily: theme('fontFamily.sans') },
				h6: { fontFamily: theme('fontFamily.sans') },
				body: { fontFamily: theme('fontFamily.serif') },
			});
		}),
		plugin(function ({ addComponents, theme }) {
			const buttons = {
				'.woocommerce a.button': {
					fontFamily: theme('fontFamily.sans'),
					fontSize: theme('fontSize.sm'),
					fontWeight: theme('fontWeight.semibold'),
					color: theme('colors.white'),
					backgroundColor: theme('colors.srf-blue.500'),
					// fontSize: '80%',
					// fontWeight: '600',
				},
			};

			addComponents(buttons);
		}),
	],
};
