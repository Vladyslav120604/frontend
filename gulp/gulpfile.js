var gulp = require('gulp');
var less = require('gulp-less');
var jsValidate = require('gulp-jsvalidate');
var browserSync = require('browser-sync');
var jscs = require('gulp-jscs');
var uglify = require('gulp-uglify');
var pump = require('pump');
var uglyfly = require('gulp-uglyfly');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var jsfuck = require('gulp-jsfuck');
var obfuscate = require('gulp-obfuscate');
var wiredep = require('wiredep').stream;
var cssGsub = require("gulp-css-gsub");



gulp.task('less', function () {
    return gulp.src('app/less/style.less')
        .pipe(less())
        .pipe(gulp.dest('app/css'))
        .pipe(browserSync.reload({stream: true}))
});


gulp.task('jsValidate', function () {
  console.log("Validate JavaScript");
  return gulp.src("app/js/**.js")
    .pipe(jsValidate());
});



gulp.task('browser-sync', function(){
	browserSync({
		server :{
			baseDir: 'app'
		},
	})
})


gulp.task('default', function (){
    return gulp.src('app/js/jsfile.js')
        .pipe(jscs())
        .pipe(jscs.reporter())
});

gulp.task('compressJs', function() {
  	gulp.src('app/js/*.js')
    .pipe(uglyfly())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('dist'))
});

gulp.task('compressCss', function () {
    gulp.src('app/css/*.css')
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('dist'));
});

gulp.task('obfuscateJs', function(){
	gulp.src('app/js/*.js')
    .pipe(obfuscate())
    .pipe(gulp.dest('dist'))
});
 
gulp.task("css-gsub", () => {
    return gulp.src("app/css/style.css")
            .pipe(cssGsub({ 
                jsIn: "dist/js/app.js", 
                jsOut: "dist/js/app.min.js",
                prefix: "d"
            }))
            .pipe(rename("main.min.css"))
            .pipe(gulp.dest("./dist"));
});

gulp.task('bower', function () {
  return gulp.src('app/index.html')
    .pipe(wiredep({
      directory: 'bower_components'//,
      //goes: 'here'
    }))
    .pipe(gulp.dest('app'));
});

gulp.task('watch',['browser-sync', 'less' ], function(){
	gulp.watch('app/less/style.less', ['less']);
	gulp.watch('app/js/**.js', ['jsValidate']);
	gulp.watch('app/index.html', browserSync.reload);
	gulp.watch('app/js/*.js', browserSync.reload);
	gulp.watch('bower.json', ['bower']);
	
});