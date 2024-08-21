# Tempel Theme

## Prerequisites
- NVM [Mac OSx](https://github.com/creationix/nvm) or [Windows](https://github.com/coreybutler/nvm-windows)
- [Gulp](https://www.npmjs.com/package/gulp) (Installed globally)
- Use Yarn instead of NPM to install modules (Comes with NVM by default)

## Installation

### Clone the repository
1. `cd ./wp-content/themes`
2. `git clone git@github.com:studiotempel/rocket-ship.git ./rocket-ship`

### Install dependencies
1. `cd ./tempel`
2. `nvm use 12.16.1`
3. `yarn install`

### Set up for local development
Edit `gulpfile.babel.js` and point `const proxyUrl = 'plugin-dev.wp';` to your local development URL

All done!

## Usage
As soon as you're ready to start developing:
1. Make sure you open up your console or terminal app and move into the theme
   directory like so: `cd /wp-content/themes/rocket-ship`.
2. Run the `gulp` command
3. A browser should now pop up with [BrowserSync](https://browsersync.io/) automatically injecting your CSS, JS and
   Image changes

## Packages used
- @babel/core
- @babel/register
- babel-preset-es2015
- babel-register
- bourbon
- bourbon-neat
- browser-sync
- gulp
- gulp-autoprefixer
- gulp-babel
- gulp-concat
- gulp-imagemin
- gulp-jshint
- gulp-plumber
- gulp-sass
- gulp-sourcemaps
- gulp-uglify
- jshint
- jshint-stylish
- normalize-scss

## Livegang checklist
Loop bij de livegang [deze checklist](https://docs.google.com/forms/d/e/1FAIpQLSdWiGjbi7QkADkiMNv0sSOSDDjXnEgcDi5-VcLDGcJmoUa_PQ/viewform?usp=sf_link) langs.
