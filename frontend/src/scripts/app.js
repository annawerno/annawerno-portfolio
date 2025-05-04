function toggleSidebar() {
  var sidebar = document.getElementById("sidebar");
  sidebar.classList.toggle("expanded");
  // document.body.style.paddingRight = sidebar.classList.contains("expanded")
  //   ? "250px"
  //   : "60px";
}

document.getElementById("nav-toggle").addEventListener("click", function () {
  this.classList.toggle("open");
  document.querySelector(".header__menu-container").classList.toggle("active");
});

// Function to close the menu
function closeMenu() {
  document.getElementById("nav-toggle").classList.remove("open");
  document.querySelector(".header__menu-container").classList.remove("active");
}

// Close menu when a menu item is clicked
document.querySelectorAll(".header__menu a").forEach((item) => {
  item.addEventListener("click", closeMenu);
});

// Also close menu when .btn-contact is clicked
const contactBtn = document.querySelector(".btn-contact");
if (contactBtn) {
  contactBtn.addEventListener("click", closeMenu);
}

// Open the modal when a post is clicked
function openModal(postName) {
  var modal = document.getElementById(postName + "-modalOverlay");
  modal.style.display = "flex"; // Show the modal
}

// Close the modal
function closeModal(postName) {
  var modal = document.getElementById(postName + "-modalOverlay");
  modal.style.display = "none"; // Hide the modal
}

// Close modal when clicking outside the modal
window.onclick = function (event) {
  var modals = document.querySelectorAll(".portfolio__item-modal-overlay");
  modals.forEach(function (modal) {
    if (event.target === modal) {
      modal.style.display = "none"; // Close modal when clicked outside
    }
  });
};

document.addEventListener("DOMContentLoaded", () => {
  const contactButton = document.querySelector(".btn-contact");
  const contactSection = document.getElementById("contact");

  if (contactButton && contactSection) {
    contactButton.addEventListener("click", () => {
      contactSection.scrollIntoView({ behavior: "smooth" });
    });
  }
});
