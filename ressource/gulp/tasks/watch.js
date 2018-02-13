/*...*/

const config = require('../config');
const reload = require('browser-sync').reload;

gulp.task('watch',['browser-sync'], function(){
	gulp.watch("*.html").on('change',reload);
	gulp.watch("./css/*.css").on('change',reload);
	gulp.watch("./js/**/*.js").on('change',reload);
});