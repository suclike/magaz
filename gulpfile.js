(function() {

  'use strict';

  // Include Gulp & Tools
  var gulp         = require('gulp'),
      sass         = require('gulp-sass'),
      rtlcss       = require('gulp-rtlcss'),
      autoprefixer = require('gulp-autoprefixer'),
      runSequence  = require('run-sequence'),
      concat       = require('gulp-concat'),
      rename       = require('gulp-rename'),
      uglify       = require('gulp-uglify'),
      plumber      = require('gulp-plumber'),
      gutil        = require('gulp-util');

  var onError = function(err) {
    console.log('An error occurred:', gutil.colors.magenta(err.message));
    gutil.beep();
    this.emit('end');
  };

  // SASS
  gulp.task('sass', function () {
    return gulp.src('./sass/*.scss')
    .pipe(plumber({ errorHandler: onError }))
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./'))              // Output LTR stylesheets
    .pipe(rtlcss())                     // Convert to RTL
    .pipe(rename({ basename: 'rtl' }))  // Append '-rtl' to the filename
    .pipe(gulp.dest('./'));             // Output RTL stylesheets
  });

  // JavaScript
  gulp.task('js', function() {
    return gulp.src([
      './node_modules/evil-icons/assets/evil-icons.min.js',
      './bower_components/jquery.fitvids/jquery.fitvids.js',
      './js/scripts/skip-link-focus-fix.js',
      './js/scripts/app.js'])
      .pipe(plumber({ errorHandler: onError }))
      .pipe(concat('app.js'))
      .pipe(gulp.dest('./js'));
  });

  // Watch
  gulp.task('watch', function() {
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch('./js/scripts/**/*.js', ['js']);
  });

  // Build
  gulp.task('build', [], function() {
    runSequence('sass', 'js');
  });

  // Default
  gulp.task('default', ['build', 'watch']);

})();