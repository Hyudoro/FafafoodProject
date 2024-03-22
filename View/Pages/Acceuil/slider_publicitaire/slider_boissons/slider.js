let slideIndexBoissons = 1;
showSlideBoissons(slideIndexBoissons);

// Change le slide toutes les 2 secondes
let slideIntervalBoissons = setInterval(function() { changeSlideBoissons(1); }, 2000);

function changeSlideBoissons(n) {
    clearInterval(slideIntervalBoissons); // Stoppe le défilement automatique
    slideIndexBoissons += n;
    showSlideBoissons(slideIndexBoissons);
    slideIntervalBoissons = setInterval(function() { changeSlideBoissons(1); }, 2000); // Redémarre le défilement automatique
}

function showSlideBoissons(n) {
    const slides = document.getElementsByClassName("slides-boissons")[0].getElementsByTagName("div");
    const totalSlides = slides.length;
    
    if (n > totalSlides) { slideIndexBoissons = 1; }
    if (n < 1) { slideIndexBoissons = totalSlides; }

    for (let i = 0; i < totalSlides; i++) {
        slides[i].classList.remove("slideIn-boissons", "slideOut-boissons");
        slides[i].style.visibility = "hidden";
        slides[i].style.opacity = "0";
    }

    slides[slideIndexBoissons - 1].style.visibility = "visible";
    slides[slideIndexBoissons - 1].style.opacity = "1";
    slides[slideIndexBoissons - 1].classList.add("slideIn-boissons");
}

showSlideBoissons(slideIndexBoissons); // Affiche le premier slide
