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

