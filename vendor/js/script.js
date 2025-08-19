function showPopup() {
    document.getElementById("successPopup").style.display = "flex";
  }

  function closePopup() {
    document.getElementById("successPopup").style.display = "none";
  }

  // Contoh penggunaan (misalnya setelah submit form sukses)
  document.getElementById("contact").addEventListener("submit", function(e) {
    e.preventDefault(); // Cegah form submit normal

    // Simulasi delay / sukses submit (bisa diganti AJAX, dll)
    setTimeout(() => {
      showPopup();
      this.reset(); // Reset form setelah submit
    }, 500);
  });