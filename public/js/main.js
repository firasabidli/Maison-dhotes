(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


  
    
})(jQuery);

// search dynamaque avec suggestions
function showSuggestions() {
    const list = document.getElementById("suggestionList");
    list.classList.add("show");

    document.querySelectorAll(".suggestion-text").forEach(item => {
        item.onclick = () => {
            const nom = item.textContent;
            const id = item.getAttribute("data-id");

            // Remplir le champ
            document.getElementById("searchInput").value = nom;

            // Fermer la suggestion
            list.classList.remove("show");

            // Rediriger vers la page détail
            window.location.href = "/maison/detail/" + id ; // Adapte si nécessaire selon ta route
        };
    });
}

// Fermer au clic extérieur
document.addEventListener("click", function(event) {
    const input = document.getElementById("searchInput");
    const list = document.getElementById("suggestionList");
    if (!input.contains(event.target) && !list.contains(event.target)) {
        list.classList.remove("show");
    }
});

// Supprimer suggestion
function removeSuggestion(el) {
    el.closest('li').remove();
}


// modal réservation

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


// upload avatar => remplacer l'image sélectionné au lieu de l'image noprofil.jpg

document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.querySelector(".upload input[type='file']");
    const imgPreview = document.querySelector(".upload img");
  
    fileInput.addEventListener("change", function (event) {
        const file = event.target.files[0];
  
        if (file) {
            const reader = new FileReader();
  
            reader.onload = function (e) {
                imgPreview.src = e.target.result;
            };
  
            reader.readAsDataURL(file);
        }
    });
  });