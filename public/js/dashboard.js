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

// modal popup
document.addEventListener('DOMContentLoaded', function () {
    // Gérer l'ouverture de tous les modals via data-modal-target
    document.querySelectorAll('[data-modal-target]').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-target');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'block';
                modal.classList.add('show-modal');
            }
        });
    });

    // Gérer la fermeture des modals via bouton .close ou clic hors modal
    document.querySelectorAll('.modal').forEach(modal => {
        const closeBtn = modal.querySelector('.close');
        closeBtn?.addEventListener('click', () => {
            modal.classList.remove('show-modal');
            setTimeout(() => modal.style.display = 'none', 300);
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('show-modal');
                setTimeout(() => modal.style.display = 'none', 300);
            }
        });
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
