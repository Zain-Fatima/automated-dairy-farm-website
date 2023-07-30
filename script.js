// Function to handle navigation clicks
function handleNavigationClick(event) {
  event.preventDefault();
  var target = event.target;

  // Check the target element and perform corresponding actions
  if (target.matches('a')) {
    var linkText = target.textContent;

    // Perform different actions based on the clicked link
    switch (linkText) {
      case 'Home':
        // Display the home content
        displayHome();
        break;
      case 'Daily Reports':
        // Display the daily reports
        displayReports('daily');
        break;
      case 'Weekly Reports':
        // Display the weekly reports
        displayReports('weekly');
        break;
      case 'Monthly Reports':
        // Display the monthly reports
        displayReports('monthly');
        break;
      case 'Yearly Reports':
        // Display the yearly reports
        displayReports('yearly');
        break;
      case 'Cattle Profile':
        // Display the cattle profile
        displaySection('cattle-profile');
        break;
      default:
        // Handle other links if needed
        break;
    }
  }
}

// Function to display the home content
function displayHome() {
  var content = document.getElementById('content');
  content.innerHTML = `
    <h2>Welcome to the Automated Dairy Farm Dashboard!</h2>
    <p>Select a section from the menu to get started.</p>
  `;
}

// Function to display the reports
function displayReports(reportType) {
  var content = document.getElementById('content');
  content.innerHTML = `
    <h2>${capitalizeFirstLetter(reportType)} Reports</h2>
    <p>This section will display the ${reportType} reports.</p>
  `;
}

// Function to display a specific section
function displaySection(section) {
  var content = document.getElementById('content');
  content.innerHTML = `
    <h2>${capitalizeFirstLetter(section)}</h2>
    <p>This section will display the ${section}.</p>
  `;
}

// Function to capitalize the first letter of a string
function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

// Attach click event listener to the navigation links
var navLinks = document.querySelectorAll('.sidebar nav ul li a');
navLinks.forEach(function(link) {
  link.addEventListener('click', handleNavigationClick);
});

// Display the home content initially
displayHome();

// Additional functionality

// Function to show the settings section
function showSettings() {
  var settings = document.getElementById('settings');
  settings.style.display = 'block';
}

// Script to change the website background
function changeWebsiteBackground(color) {
  document.body.style.backgroundColor = color;
}

// Script to change the dashboard background
function changeDashboardBackground(color) {
  document.getElementById('content').style.backgroundColor = color;
}
