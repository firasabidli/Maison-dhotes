let menu = document.querySelector('.menu')
let sidebar = document.querySelector('.sidebar')
let mainContent = document.querySelector('.main--content')

menu.onclick = function() {
    sidebar.classList.toggle('active')
    mainContent.classList.toggle('active')
}

document.addEventListener("DOMContentLoaded", function () {
    let profileBtn = document.getElementById("profile-btn");
    let profileMenu = document.getElementById("profile-menu");

    profileBtn.addEventListener("click", function (event) {
        event.stopPropagation();
        profileMenu.classList.toggle("show");
    });

    document.addEventListener("click", function () {
        profileMenu.classList.remove("show");
    });

    profileMenu.addEventListener("click", function (event) {
        event.stopPropagation();
    });
});

// modal Popup

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal-ajout');
    const openBtn = document.querySelector('.add');
    const closeBtn = document.querySelector('.close');

    openBtn.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fermer si on clique en dehors du contenu
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});

// Alert

window.addEventListener('DOMContentLoaded', () => {
    const alert = document.querySelector('.custom-alert');

    if (alert) {
        // Affiche l'alerte avec animation
        alert.classList.add("show", "showAlert");
        alert.classList.remove("hide");

        // Masquer automatiquement après 5 secondes
        const hideTimeout = setTimeout(() => {
            alert.classList.remove("show", "showAlert");
            alert.classList.add("hide");
        }, 5000);

        // Bouton de fermeture manuelle
        const closeBtn = alert.querySelector('.close-btn');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                clearTimeout(hideTimeout); // empêche le double retrait
                alert.classList.remove("show", "showAlert");
                alert.classList.add("hide");
            });
        }
    }
});
