const toggleSwitch = document.getElementById('dark-mode-toggle');
const body = document.body;
const navbar = document.querySelector('.navbar');
const cardBodies = document.querySelectorAll('.card-body');
const cardTexts = document.querySelectorAll('.card-text');
const modal = document.getElementById('regform');

// Function to enable dark mode
function enableDarkMode() {
  body.classList.add('dark-mode');
  navbar.classList.add('dark-mode');
  cardBodies.forEach(cardBody => cardBody.classList.add('bg-dark'));
  cardTexts.forEach(cardText => cardText.classList.add('text-white'));
  modal.classList.add('dark-mode');
  // Store dark mode preference in local storage
  localStorage.setItem('darkMode', 'enabled');
}

// Function to disable dark mode
function disableDarkMode() {
  body.classList.remove('dark-mode');
  navbar.classList.remove('dark-mode');
  cardBodies.forEach(cardBody => cardBody.classList.remove('bg-dark'));
  cardTexts.forEach(cardText => cardText.classList.remove('text-white'));
  modal.classList.remove('dark-mode');
  // Remove dark mode preference from local storage
  localStorage.removeItem('darkMode');
}

// Event listener for the toggle switch change event
toggleSwitch.addEventListener('change', function () {
  if (toggleSwitch.checked) {
    enableDarkMode();
  } else {
    disableDarkMode();
  }
});

// Check dark mode preference from local storage on page load
const darkModePreference = localStorage.getItem('darkMode');
if (darkModePreference === 'enabled') {
  toggleSwitch.checked = true;
  enableDarkMode();
} else {
  toggleSwitch.checked = false;
  disableDarkMode();
}