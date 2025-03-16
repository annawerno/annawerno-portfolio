function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  sidebar.classList.toggle("expanded");
  // document.body.style.paddingRight = sidebar.classList.contains("expanded")
  //   ? "250px"
  //   : "60px";
}

document.getElementById("nav-toggle").addEventListener("click", function () {
  this.classList.toggle("open");
  document.querySelector(".header__menu").classList.toggle("active");
});

// Close menu when a menu item is clicked
document.querySelectorAll(".header__menu a").forEach((item) => {
  item.addEventListener("click", function () {
    document.getElementById("nav-toggle").classList.remove("open");
    document.querySelector(".header__menu").classList.remove("active");
  });
});
