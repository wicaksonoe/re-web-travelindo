var gulp = require("gulp");
var sass = require("gulp-sass");

sass.compiler = require("node-sass");

gulp.task('build', function() {
    return gulp.src('./src/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/assets/css'));
});

gulp.task('build:watch', function() {
    gulp.watch('./src/scss/**/*.scss', gulp.series('build'));
});