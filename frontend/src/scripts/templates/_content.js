// Hello references accordion
document
  .querySelector(".accordion.main")
  .addEventListener("click", function (e) {
    e.stopPropagation(); // Prevent document click from triggering

    let panel = this.nextElementSibling;
    const isOpen = panel.style.display === "block";

    // Toggle main panel
    panel.style.display = isOpen ? "none" : "block";

    // 🔥 If closing the main, also close all sub accordions
    if (isOpen) {
      // Close all sub panels
      document
        .querySelectorAll(".accordion.sub + .panel")
        .forEach((subPanel) => {
          subPanel.style.display = "none";
        });

      // Remove active class from subs
      document.querySelectorAll(".accordion.sub").forEach((acc) => {
        acc.classList.remove("active");
      });
    }
  });

// Toggle sub-accordions independently
document.querySelectorAll(".accordion.sub").forEach((button) => {
  button.addEventListener("click", function (e) {
    e.stopPropagation(); // Prevent document click from triggering

    let subPanels = document.querySelectorAll(".accordion.sub + .panel");

    subPanels.forEach((panel) => {
      if (panel !== this.nextElementSibling) {
        panel.style.display = "none";
      }
    });

    document.querySelectorAll(".accordion.sub").forEach((acc) => {
      if (acc !== this) {
        acc.classList.remove("active");
      }
    });

    this.classList.toggle("active");

    let panel = this.nextElementSibling;
    panel.style.display = panel.style.display === "block" ? "none" : "block";
  });
});

// 🔥 Close all accordions if clicked outside
document.addEventListener("click", function (e) {
  const isAccordion = e.target.closest(".accordion");
  const isPanel = e.target.closest(".panel");

  if (!isAccordion && !isPanel) {
    // Close all panels
    document.querySelectorAll(".panel").forEach((panel) => {
      panel.style.display = "none";
    });

    // Remove active classes
    document.querySelectorAll(".accordion").forEach((acc) => {
      acc.classList.remove("active");
    });
  }
});
