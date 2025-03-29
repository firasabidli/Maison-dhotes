const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");




inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value !== "") return;
    inp.classList.remove("active");
  });
});


toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

document.addEventListener("DOMContentLoaded", function() {
  let toast = document.querySelector(".notification--failure");
  if (toast) {
      setTimeout(() => {
          toast.style.display = "none";
      }, 5000);
  }

  // Appliquer le mode sign-up si l'inscription a échoué
  if (document.querySelector("main").classList.contains("sign-up-mode")) {
      document.querySelector("main").classList.add("sign-up-mode");
  }
});


document.querySelectorAll(".toggle-password").forEach((toggle) => {
  toggle.addEventListener("click", function () {
      let input = this.closest(".input-wrap").querySelector(".password-field");

      if (input.type === "password") {
          input.type = "text";
          this.innerHTML = '<i class="bi bi-eye-fill"></i>'; // Icône pour masquer
      } else {
          input.type = "password";
          this.innerHTML = '<i class="bi bi-eye-slash-fill"></i>'; // Icône pour afficher
      }
  });
});




