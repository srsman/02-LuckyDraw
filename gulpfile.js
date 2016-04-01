var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var uglify = require('gulp-uglify');
var image = require('gulp-image');
var browserSync = require('browser-sync').create();

// 开发阶段
gulp.task("dev", ["serve"]);

// 开发阶段：浏览器自动刷新
gulp.task('serve', ['dev:sass', 'dev:js'], function() {
    browserSync.init({
        proxy: "http://localhost/Pro2-LuckyDraw/public/admin/login"
    });
    gulp.watch("./public/scss/**/*.scss", ['dev:sass']);
    gulp.watch("./public/js/**/*.js", ['dev:js']);
    gulp.watch("./resources/views/**/*.blade.php").on('change', browserSync.reload);
});

// 开发阶段：复制 JS
gulp.task('dev:js', function () {
  return gulp.src('./public/js/**/*.js')
      .pipe(gulp.dest('./public/dist/js/'))
      .pipe(browserSync.stream());
});

// 编译 Sass 并把 CSS 注入浏览器
gulp.task('dev:sass', function() {
    return gulp.src("./public/scss/index.scss")
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
                browsers: ['last 4 versions', '> 5% in CN', '> 5%','not ie <= 8', 'last 6 Android versions'],
                cascade: false
            }))
        .pipe(gulp.dest('./public/css/'))
        .pipe(gulp.dest('./public/dist/css/'))
        .pipe(browserSync.stream());
});



// 打包阶段
gulp.task("build", ['build:css', 'build:JS', "build:img"], function () {
  console.log("编译已完成，请查看 dist 文件夹");
})

// 打包阶段：编译 Scss 并压缩 CSS
gulp.task('build:css', function () {
  return gulp.src("./public/scss/index.scss")
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
            browsers: ['last 4 versions', '> 5% in CN', '> 5%','not ie <= 8', 'last 6 Android versions'],
            cascade: true
        }))
    .pipe(cssnano())
    .pipe(gulp.dest('./public/dist/css/'));
});

// 打包阶段：压缩图片
gulp.task('build:img', function () {
  gulp.src('./public/img/**/*.*')
    .pipe(image({
      pngquant: true,
      optipng: false,
      zopflipng: true,
      advpng: true,
      jpegRecompress: false,
      jpegoptim: true,
      mozjpeg: true,
      gifsicle: true,
      svgo: true
    }))
    .pipe(gulp.dest('./public/dist/img/'));
});

// 打包阶段：压缩 JS
gulp.task('build:JS', function () {
  gulp.src('./public/js/**/*.js')
      .pipe(uglify())
      .pipe(gulp.dest('./public/dist/js/'));
});



// 默认任务
gulp.task('default', ['dev']);
