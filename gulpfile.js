import gulp from "gulp";
import browserSync from "browser-sync";

// styles
import * as sass from "sass";
import gulpSass from "gulp-sass";
const scss = gulpSass(sass);
import autoprefixer from "gulp-autoprefixer";
import cssMinify from "gulp-clean-css";
import concat from "gulp-concat";

// browserSync instance
const bs = browserSync.create();

// styles task
function styles() {
  return gulp
    .src("./frontend/src/styles/**/*.scss")
    .pipe(scss())
    .pipe(
      autoprefixer({
        overrideBrowserslist: ["last 2 versions"],
        cascade: false,
      })
    )
    .pipe(concat("app.css")) // ✅ Combine into one file
    .pipe(cssMinify()) // ✅ Minify it
    .pipe(gulp.dest("./frontend/dist/styles"))
    .pipe(bs.stream()); // Injects changes
}

// scripts
import jsMinify from "gulp-terser";
import babel from "gulp-babel";

// scripts task
function scripts() {
  return gulp
    .src("./frontend/src/scripts/**/*.js")
    .pipe(concat("app.js")) // ✅ Merge all JS into one
    .pipe(babel({ presets: ["@babel/preset-env"] })) // ✅ Transpile ES6+
    .pipe(jsMinify()) // ✅ Minify
    .pipe(gulp.dest("./frontend/dist/scripts/"));
}

// BrowserSync reload task
function browserSyncReload(cb) {
  bs.reload();
  cb();
}

// Watch task with BrowserSync
function watchTask() {
  bs.init({
    proxy: "annawerno-portfolio.local/", // Set this to your local dev URL
    socket: {
      domain: "localhost:3000",
    },
  });

  gulp.watch("./frontend/src/styles/**/*.scss", styles);
  gulp.watch(
    "./frontend/src/scripts/**/*.js",
    gulp.series(scripts, browserSyncReload)
  );
  gulp.watch(["./**/*.php", "./**/*.twig"], gulp.series(browserSyncReload));
}

// Default Gulp task
export default gulp.series(styles, scripts, watchTask);
