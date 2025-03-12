//

import gulp from "gulp";
import browserSync from "browser-sync";

// styles
import * as sass from "sass";
import gulpSass from "gulp-sass";
const scss = gulpSass(sass);
import autoprefixer from "gulp-autoprefixer";
import cssMinify from "gulp-clean-css";

// browserSync instance
const bs = browserSync.create();

// styles task
function styles() {
  return gulp
    .src("./frontend/src/styles/**/*.scss")
    .pipe(scss())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(cssMinify())
    .pipe(gulp.dest("./frontend/dist/styles"))
    .pipe(bs.stream()); // Injects CSS changes
}

// scripts
import concat from "gulp-concat";
import jsMinify from "gulp-terser";
import babel from "gulp-babel";

// scripts task
function scripts() {
  return gulp
    .src("./frontend/src/scripts/**/*.js")
    .pipe(concat("app.js")) // ✅ Merge all JS into one
    .pipe(babel({ presets: ["@babel/preset-env"] })) // ✅ Convert ES6+ to browser-compatible JS
    .pipe(jsMinify()) // ✅ Minify it
    .pipe(gulp.dest("./frontend/dist/scripts/"))
    .pipe(bs.stream());
}

// Browsersync reload task
function browserSyncReload(cb) {
  bs.reload(); // FIXED this line
  cb();
}

// Watch task with BrowserSync
function watchTask() {
  bs.init({
    proxy: "annawerno-portfolio.local/", // Change this value to match your local URL.
    socket: {
      domain: "localhost:3000",
    },
  });

  gulp.watch("./frontend/src/styles/**/*.scss", styles);
  gulp.watch("./frontend/src/scripts/**/*.js", scripts);
  gulp.watch(["./**/*.php", "./**/*.twig"], gulp.series(browserSyncReload));
}

// Default Gulp task
export default gulp.series(styles, scripts, watchTask);
