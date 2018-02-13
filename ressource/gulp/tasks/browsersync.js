/*...*/

const gulp = require('gulp');
const config = require('../config');
const browserSync = require('browser-sync');

gulp.task('browsersync', function(){
	browserSync.init(null, config.browserSync)
});