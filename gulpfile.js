var gulp = require('gulp');
var sass = require('gulp-sass');
var copy = require('gulp-copy');


gulp.task('default', function () {});

gulp.task('sass', function () {
    gulp.src('./web/bundles/app/sass/master.scss')
        .pipe(sass({
            sourceComments: 'map',
            includePaths: [
                "./web",
                "./web/components",
                "./web/components/bootstrap-sass/assets/stylesheets",
            ]
        }))
        .pipe(gulp.dest('./web/css/'));
});

gulp.task('fonts', function () {
    return gulp.src('./web/components/bootstrap-sass/assets/fonts/bootstrap/*')
        .pipe(copy('./web/fonts', {prefix: 7}));
});

gulp.task('js', function() {
    gulp.src([
            './web/bundles/*/js/**/*.js',
            './web/components/bootstrap-sass/assets/javascripts/**/*.js',
            './web/components/jquery/dist/jquery.js',
            './web/components/requirejs/require.js'
        ])
        .pipe(gulp.dest('./web/js'));
});
