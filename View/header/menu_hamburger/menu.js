// menu.js
function toggleMenu() {
    const navbar = document.getElementById("navbar");
    if (navbar.classList.contains("nav-hidden")) {
        navbar.classList.remove("nav-hidden");
        navbar.classList.add("nav-visible");
    } else {
        navbar.classList.add("nav-hidden");
        navbar.classList.remove("nav-visible");
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("navbar").classList.add("nav-hidden");
});
