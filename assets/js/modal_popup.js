document.addEventListener("DOMContentLoaded", function () {
  const addButton = document.getElementById("addButton");
  const modalBackground = document.getElementById("modalBackground");
  const modal = document.getElementById("modal");
  const closeButton = document.getElementById("closeButton");

  addButton.addEventListener("click", () => {
    modalBackground.style.display = "block";
    modal.classList.add("show");
  });

  closeButton.addEventListener("click", () => {
    closeModal();
  });

  modalBackground.addEventListener("click", (event) => {
    if (event.target === modalBackground) {
      closeModal();
    }
  });

  function closeModal() {
    modal.classList.remove("show");
    modalBackground.style.display = "none";
  }
});
