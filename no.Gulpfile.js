// var themename = 'foundryforged';

var gulp = require('gulp'),
	// Prepare and optimize code etc
	autoprefixer = require('autoprefixer'),
	// browserSync = require('browser-sync').create(),
	image = require('gulp-image'),
	jshint = require('gulp-jshint'),
	postcss = require('gulp-postcss'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	$ = require('gulp-load-plugins')(),
	sassPaths = [
		'node_modules/foundation-sites/scss',
		'node_modules/motion-ui/src'
	],

	// Only work with new or updated files
	newer = require('gulp-newer'),

	// Name of working theme folder
	root = '',
	scss = root + 'sass/',
	js = root + 'js/',
	img = root + 'images/',
	languages = root + 'languages/';


// CSS via Sass and Autoprefixer
gulp.task('css', function() {
	return gulp.src(scss + '{style.scss,rtl.scss}')
	.pipe(sourcemaps.init())
	.pipe($.sass({
		includePaths: sassPaths,
		outputStyle: 'expanded', 
		indentType: 'tab',
		indentWidth: '1'
	}).on('error', $.sass.logError))
	.pipe($.postcss([
		autoprefixer({
			browsers: ['last 2 versions', 'ie >= 9', 'android >= 4.4', 'ios >= 7']
		})
	]))
	.pipe(sourcemaps.write(scss + 'maps'))
	.pipe(gulp.dest(root));
});

// Optimize images through gulp-image
gulp.task('images', function() {
	return gulp.src(img + 'RAW/**/*.{jpg,JPG,png}')
	.pipe(newer(img))
	.pipe(image())
	.pipe(gulp.dest(img));
});

// JavaScript
gulp.task('javascript', function() {
	return gulp.src([js + '*.js'])
	.pipe(jshint())
	.pipe(jshint.reporter('default'))
	.pipe(gulp.dest(js));
});


// Watch everything
gulp.task('watch', function() {
	// browserSync.init({ 
	// 	open: 'external',
	// 	proxy: 'foundry.local',
	// 	port: 8080
	// });
	gulp.watch([root + '**/*.css', root + '**/*.scss' ], ['css']);
	gulp.watch(js + '**/*.js', ['javascript']);
	gulp.watch(img + 'RAW/**/*.{jpg,JPG,png}', ['images']);
	// gulp.watch(root + '**/*').on('change', browserSync.reload);
});


// Default task (runs at initiation: gulp --verbose)
gulp.task('default', ['watch']);
