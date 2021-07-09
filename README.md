# WordPress.com/go

This is the development repository for the 2019 https://wordpress.com/go redesign.

## Usage

Developed as a traditional WordPress theme, you can download this repository and drop it into the **wp-content > themes** directory and activate it from **Appearance > Themes** in the wp-admin Dashboard.

### Styles

The main stylesheet is compiled with [Sass](https://sass-lang.com/). To make adjustments to the site styles, run `npm install` from the root of this theme's directory (requires [Node.js](https://nodejs.org/) and [NPM](https://www.npmjs.com/)).

After the dependencies have been installed, you can run `npm run styles` to compile once. Alternatively, you can run `npm run styles:watch` to make continuous changes and have Sass watch and re-compile your stylesheets on each change.