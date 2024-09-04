import gulp from 'gulp';
import browserSync from 'browser-sync';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import uglify from 'gulp-uglify';
import jshint from 'gulp-jshint';
import stylish from 'jshint-stylish';
import concat from 'gulp-concat';
import autoprefixer from 'gulp-autoprefixer';
import plumber from 'gulp-plumber';
import babel from 'gulp-babel';

const reload = browserSync.reload;
const proxyUrl = 'tempel-v2.local';
const sass = gulpSass(dartSass);

const paths = {
    scripts: {
        source: 'assets/js/scripts.js',
        destination: 'dist/js/',
        destinationWatcher: 'dist/js/scripts.min.js'
    },
    sass: {
        source: 'assets/sass/styles.scss',
        sourceWatcher: 'assets/sass/**/*.scss',
        destination: 'dist/css/',
    },
    vendor: {
        source: 'assets/vendor/**/*',
        destination: 'dist/vendor',
    },
    images: {
        source: 'assets/images/**/*',
        destination: 'dist/images',
    },
    php: {
        source: '**/*.php',
    }
};

export function styles() {
    return gulp.src(paths.sass.source)
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(sass({
            includePaths: ['node_modules'],
            outputStyle: 'compressed'
        }))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(concat('parent-styles.min.css'))
        .pipe(gulp.dest(paths.sass.destination))
        .pipe(reload({stream: true}));
}

export function scripts() {
    return gulp.src(paths.scripts.source)
        .pipe(babel())
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter(stylish))
        .pipe(uglify())
        .pipe(concat('parent-scripts.min.js'))
        .pipe(gulp.dest(paths.scripts.destination));
}

export function vendor() {
    return gulp.src(paths.vendor.source)
        .pipe(gulp.dest(paths.vendor.destination));
}

export function images() {
    return gulp.src(paths.images.source)
        .pipe(gulp.dest(paths.images.destination));
}

export function watch() {
    browserSync({
        proxy: proxyUrl,
        ghostMode: false,
    });

    gulp.watch(paths.sass.sourceWatcher, styles);
    gulp.watch(paths.scripts.source, scripts);
    gulp.watch(paths.vendor.source, vendor);
    gulp.watch(paths.images.source, images);
    gulp.watch([
        paths.php.source,
        paths.scripts.destinationWatcher,
    ]).on('change', reload);
}

const build = gulp.parallel(styles, scripts, vendor, images, watch);

gulp.task('build', build);
gulp.task('default', build);

export default build;