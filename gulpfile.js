/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 * @author Ahmad Awais (@ahmadawais)
 * @version 1.0.3
 */

/**
 * Configuration.
 *
 * Project Configuration for gulp tasks.
 *
 * In paths you can add <<glob or array of globs>>. Edit the variables as per your project requirements.
 */

// START Editing Project Variables.

// Project related.
var browsersyncConfig = require('./browser-sync-config.json');

// Style related.
var styleSassSRC            = './scss/style.scss'; // Path to main .scss file.
var styleSassDestination    = './css/'; // Path to place the compiled CSS file.
// Default set to root folder.

// JS Vendor related.
var jsVendorSRC = {
    vendorPaths: [
        './node_modules/flickity/dist/flickity.pkgd.min.js',
        './node_modules/flickity-bg-lazyload/bg-lazyload.js',
			  './node_modules/jquery.easing/bower_components/jquery-easing-original/jquery.easing.min.js',
        './node_modules/popper.js/dist/umd/popper.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js'
    ]
};
var jsVendorDestination     = './js/'; // Path to place the compiled JS vendors file.
var jsVendorFile            = 'vendors'; // Compiled JS vendors file name.
// Default set to vendors i.e. vendors.js.

// JS Custom related.
var jsCustomSRC             = './js/custom.js'; // Path to JS custom scripts folder.
var jsCustomDestination     = './js/'; // Path to place the compiled JS custom scripts file.
var jsCustomFile            = 'custom'; // Compiled JS custom file name.
// Default set to custom i.e. custom.js.

// Watch files paths.
var sassWatchFiles         = './scss/**/*.scss'; // Path to all *.scss files inside css folder and inside them.
var vendorJSWatchFiles      = './js/libs/*.js'; // Path to all vendor JS files.
var customJSWatchFiles      = './js/custom.js'; // Path to all custom JS files.
var projectPHPWatchFiles    = './**/*.php'; // Path to all PHP files.


// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
];

// STOP Editing Project Variables.

/**
 * Load Plugins.
 *
 * Load gulp plugins and assing them semantic names.
 */
var gulp         = require('gulp'); // Gulp of-course


// CSS related plugins.

var sass         = require('gulp-sass'); // Gulp pluign for Sass compilation.
var minifycss    = require('gulp-uglifycss'); // Minifies CSS files.
var autoprefixer = require('gulp-autoprefixer'); // Autoprefixing magic.
var mmq          = require('gulp-merge-media-queries'); // Combine matching media queries into one media query definition.

// JS related plugins.
var concat       = require('gulp-concat'); // Concatenates JS files
var uglify       = require('gulp-uglify'); // Minifies JS files

// Image realted plugins.
//var imagemin     = require('gulp-imagemin'); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var lineec       = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
var filter       = require('gulp-filter'); // Enables you to work on a subset of the original files by filtering them using globbing.
var sourcemaps   = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var notify       = require('gulp-notify'); // Sends message notification to you
var browserSync  = require('browser-sync').create(); // Reloads browser and injects CSS. Time-saving synchronised browser testing.
var reload       = browserSync.reload; // For manual browser reload.




/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * This task does the following:
 *    1. Sets the project URL
 *    2. Sets inject CSS
 *    3. You may define a custom port
 *    4. You may want to stop the browser from openning automatically
 */
gulp.task( 'browser-sync', function() {
    browserSync.init( {
        proxy : browsersyncConfig.proxy
    });
});


/**
 * Task: `compile-sass`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    3. Writes Sourcemaps for it
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix .min.css
 *    6. Minifies the CSS file and generates style.min.css
 *    7. Injects CSS or reloads the browser via browserSync
 */
gulp.task('compile-sass', function () {
    gulp.src( styleSassSRC )
        .pipe( sourcemaps.init() )
        .pipe( sass( {
            errLogToConsole: true,
            outputStyle: 'compact',
            //outputStyle: 'compressed',
            // outputStyle: 'nested',
            // outputStyle: 'expanded',
            precision: 10
        } ) )
        .on('error', console.error.bind(console))
        .pipe( sourcemaps.write( { includeContent: false } ) )
        .pipe( sourcemaps.init( { loadMaps: true } ) )
        .pipe( autoprefixer( AUTOPREFIXER_BROWSERS ) )

        .pipe( sourcemaps.write ( styleSassDestination ) )
        .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
        .pipe( gulp.dest( styleSassDestination ) )

        .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
        .pipe( mmq( { log: true } ) ) // Merge Media Queries only for .min.css version.

        .pipe( browserSync.stream() ) // Reloads style.css if that is enqueued.

        .pipe( rename( { suffix: '.min' } ) )
        .pipe( minifycss( {
            maxLineLen: 10
        }))
        .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
        .pipe( gulp.dest( styleSassDestination ) )

        .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
        .pipe( browserSync.stream() )// Reloads style.min.css if that is enqueued.
        .pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
});

/**
 * Task: `compile-sass-lite`.
 *
 * Compiles Sass.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 */
/* Task to compile sass unminified & unmapped */
gulp.task('compile-sass-lite', function() {
    gulp.src(styleSassSRC)
        .pipe(sass())
        .pipe(gulp.dest(styleSassDestination))
        .pipe( notify( { message: 'TASK: "compile-sass" Completed! 💯', onLast: true } ) )
});

/**
 * Task: `vendorJS`.
 *
 * Concatenate and uglify vendor JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS vendor files
 *     2. Concatenates all the files and generates vendors.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates vendors.min.js
 */
gulp.task( 'vendorsJs', function() {
    gulp.src( jsVendorSRC.vendorPaths )
        .pipe( concat( jsVendorFile + '.js' ) )
        .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
        .pipe( gulp.dest( jsVendorDestination ) )
        .pipe( rename( {
            basename: jsVendorFile,
            suffix: '.min'
        }))
        .pipe( uglify( { mangle: false } ) )
        .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
        .pipe( gulp.dest( jsVendorDestination ) )
        .pipe( notify( { message: 'TASK: "vendorsJs" Completed! 💯', onLast: true } ) );
});


/**
 * Task: `customJS`.
 *
 * Concatenate and uglify custom JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS custom files
 *     2. Concatenates all the files and generates custom.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates custom.min.js
 */
gulp.task( 'customJS', function() {
    gulp.src( jsCustomSRC )
        .pipe( concat( jsCustomFile + '.js' ) )
        .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
        .pipe( gulp.dest( jsCustomDestination ) )
        .pipe( rename( {
            basename: jsCustomFile,
            suffix: '.min'
        }))
        .pipe( uglify() )
        .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
        .pipe( gulp.dest( jsCustomDestination ) )
        .pipe( notify( { message: 'TASK: "customJs" Completed! 💯', onLast: true } ) );
});



/**
 * Default Gulp & Watch Tasks.
 *
 * Runs Gulp and watches for specified file changes.
 * Reruns tasks and reloads browserSync on change.
 */
gulp.task( 'default', ['vendorsJs', 'customJS', 'compile-sass', 'browser-sync'], function () {
    gulp.watch( projectPHPWatchFiles, reload ); // Reload on PHP file changes.
    gulp.watch( vendorJSWatchFiles, [ 'vendorsJs', reload ] ); // Reload on vendorsJs file changes.
    gulp.watch( customJSWatchFiles, [ 'customJS', reload ] ); // Reload on customJS file changes.
    gulp.watch( sassWatchFiles, ['compile-sass', reload]); // Reload on CSS file on SASS changes.
});

