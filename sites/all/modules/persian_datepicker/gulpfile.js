var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    notify = require('gulp-notify'),
    concat = require('gulp-concat'),
    imagemin = require('gulp-imagemin'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps');
var config = {
    stylesheets :'assets/stylesheets',
    javascripts :['vendor/kamaDatepicker/src/kamadatepicker.js','assets/javascripts/*.js'],

}
gulp.task('compress',function(){
    return gulp.src(config.javascripts)
        .pipe(concat('script.min.js'))
        .pipe(uglify({mangle: false}))
        .pipe(gulp.dest('./js'));
});
gulp.task('image',function() {
    gulp.src('images/*')
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest('dist/images'))
});
gulp.task('css', function() {
    return sass(config.stylesheets + '/style.scss',{style: 'compact', sourcemap: true})
        .on('error', notify.onError(function(error) {
            return 'Error: ' + error.message;
        }))
        .pipe(concat('datepicker.css'))
        .pipe(sourcemaps.init())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./css'))

});
gulp.task('watch', function() {
    gulp.watch(config.javascripts,['compress']);
    gulp.watch([config.stylesheets + '/*.scss'], ['css']);
});

gulp.task('default', ['css','compress']);
