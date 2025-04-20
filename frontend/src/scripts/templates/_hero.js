const heroHello = document.querySelector("#hero__hello");

// const sentences = [
//   "Hello World",
//   "Hello ...is it me you're looking for?",
//   "Hello Clarice",
//   "Hello darkness, my old friend...",
//   "Hello. My name is Inigo Montoya. You killed my father. Prepare to die!",
// ];

const sentences = phpVariables.sentences;

// Predefined colors for the rest of the sentence (after "Hello")
const sentenceColors = ["#2C6E49", "#F26A8D", "#99CC33", "#4C956C", "#F39237"];

let sentenceIndex = 0;
const typingSpeed = 100;
const deletingSpeed = 50;

// Function to display text letter by letter with colored first word
function typeText(text, index, callback) {
  // Clear the content at the beginning of typing
  if (index === 0) {
    heroHello.innerHTML = "";
    void heroHello.offsetWidth; // Force reflow to ensure clearing on iOS
  }

  // Split the text into "Hello" and the rest
  const parts = text.split(/\b(Hello\b\.?)/i);
  const firstWordComplete = parts[1] || "";
  const restOfText = parts.slice(2).join("");

  // Get the color for the current sentence (after "Hello")
  const currentColor = sentenceColors[sentenceIndex];

  // Calculate the total text to show at this index
  const currentText = text.substring(0, index);

  // If we're still typing the first word
  if (index <= firstWordComplete.length) {
    heroHello.innerHTML = `<span style="color: #040b07;">${currentText}</span>`; // Black for "Hello"
  } else {
    // We're typing the rest of the sentence with the predefined color
    heroHello.innerHTML = `<span style="color: #040b07;">${firstWordComplete}</span><span style="color: ${currentColor};">${currentText.substring(
      firstWordComplete.length
    )}</span>`;
  }

  if (index < text.length) {
    index++;
    setTimeout(function () {
      typeText(text, index, callback);
    }, typingSpeed);
  } else {
    setTimeout(callback, 1000); // Wait for a second after typing is complete
  }
}

// Function to delete text letter by letter while keeping "Hello" colored
function deleteText(text, index, callback) {
  // Split the text into "Hello" and the rest
  const parts = text.split(/\b(Hello\b\.?)/i);
  const firstWordComplete = parts[1] || "";
  const restOfText = parts.slice(2).join("");

  // Get the color for the current sentence (after "Hello")
  const currentColor = sentenceColors[sentenceIndex];

  if (index >= 0) {
    const currentText = text.substring(0, index);

    // If we still have enough characters to include the full "Hello"
    if (index >= firstWordComplete.length) {
      heroHello.innerHTML = `<span style="color: #040b07;">${firstWordComplete}</span><span style="color: ${currentColor};">${currentText.substring(
        firstWordComplete.length
      )}</span>`;
    } else {
      // We're deleting part of "Hello"
      heroHello.innerHTML = `<span style="color: #040b07;">${currentText}</span>`;
    }

    index--;
    setTimeout(function () {
      deleteText(text, index, callback);
    }, deletingSpeed);
  } else {
    heroHello.innerHTML = "";
    callback();
  }
}

function typeAndDeleteLoop() {
  const currentText = sentences[sentenceIndex];
  typeText(currentText, 0, function () {
    // Start deleting after typing is complete
    deleteText(currentText, currentText.length, function () {
      // Move to the next sentence or loop back to the start
      sentenceIndex = (sentenceIndex + 1) % sentences.length;
      setTimeout(typeAndDeleteLoop, 1000); // Wait before starting the next sentence
    });
  });
}

// Start the loop
typeAndDeleteLoop();

document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector("a[href='#ref_answers']")
    .addEventListener("click", function (event) {
      event.preventDefault();

      const target = document.getElementById("ref_answers-btn");

      if (target) {
        target.scrollIntoView({ behavior: "smooth", block: "start" });

        // Wait for scroll to finish before pulsing
        setTimeout(() => {
          target.classList.add("pulse-effect");

          // Remove the class after animation completes (1.5s for 3 pulses)
          setTimeout(() => {
            target.classList.remove("pulse-effect");
          }, 1500);
        }, 800); // Adjust delay based on scroll speed
      }
    });
});
