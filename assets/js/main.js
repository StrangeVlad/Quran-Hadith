document.addEventListener("DOMContentLoaded", function () {
  let avatar = document.querySelector(".avatar"),
    notification = document.querySelector(".notification");

  // Check if the elements with classes "avatar" and "notification" exist
  if (avatar && notification) {
    dropMenu(avatar);
    dropMenu(notification);
  } else {
    console.error(
      "Elements with classes 'avatar' or 'notification' not found."
    );
  }

  function dropMenu(selector) {
    if (selector) {
      selector.addEventListener("click", () => {
        let dropDownMenu = selector.querySelector(".dropdown-menu");
        if (dropDownMenu) {
          dropDownMenu.classList.toggle("active");
        } else {
          console.error("Dropdown menu not found for element:", selector);
        }
      });
    } else {
      console.error("Selector is null or undefined.");
    }
  }

  //SideBar Toggle
  let sidebar = document.querySelector(".sidebar"),
    bars = document.querySelector(".bars");
  bars.addEventListener("click", () => {
    sidebar.classList.contains("active")
      ? sidebar.classList.remove("active")
      : sidebar.classList.add("active");
  });

  let Visitors = [800, 320, 190, 250, 400, 600],
    Hired = [502, 203, 70, 200, 350, 400],
    years = [2015, 2016, 2017, 2018, 2019, 2020];

  // Check if the user's preference for dark mode is stored in Local Storage
  const isDarkMode = localStorage.getItem("darkMode") === "true";

  // Apply the saved dark mode preference if it exists
  if (isDarkMode) {
    document.body.classList.add("dark");
    document.querySelector(".mode i").classList.replace("fa-moon", "fa-sun");
  }

  // Toggle dark mode when the mode button is clicked
  const mode = document.querySelector(".mode");
  mode.addEventListener("click", () => {
    if (document.body.classList.contains("dark")) {
      document.body.classList.remove("dark");
      mode.querySelector("i").classList.replace("fa-sun", "fa-moon");
      localStorage.setItem("darkMode", "false"); // Update Local Storage
    } else {
      document.body.classList.add("dark");
      mode.querySelector("i").classList.replace("fa-moon", "fa-sun");
      localStorage.setItem("darkMode", "true"); // Update Local Storage
    }
  });

  window.matchMedia("(max-width : 768px)").matches
    ? sidebar.classList.remove("active")
    : sidebar.classList.add("active");
});
