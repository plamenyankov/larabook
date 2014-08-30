var gulp = require('gulp');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');
var sassDir = 'app/assets/sass';
var targetCssDir = 'public/css';
gulp.task('css',function(){
    return gulp.src(sassDir+'/main.sass')
        .pipe(sass({style:'compressed'}).on('error',gutil.log))
        .pipe(autoprefix('last 10 version'))
        .pipe(gulp.dest(targetCssDir))
        .pipe(notify('Css compiled!'));
});
gulp.task('watch',function(){
    gulp.watch(sassDir+'/**/*.sass',['css']);
});
gulp.task('default',['watch']);