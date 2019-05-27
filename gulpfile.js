var gulp = require("gulp"),
    sass = require("gulp-sass"),
    cssbeautify = require("gulp-cssbeautify");

sass.compiler = require("node-sass");

gulp.task('build', function() {
    return gulp.src('./src/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cssbeautify())
        .pipe(gulp.dest('./dist/assets/css'))
        .pipe(gulp.dest('./public/assets/css'));
});

gulp.task('build:watch', function() {
    gulp.watch('./src/scss/**/*.scss', gulp.series('build'));
});