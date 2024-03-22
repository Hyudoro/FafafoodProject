let slideIndexPlats = 1;
showSlidePlats(slideIndexPlats);

// Change le slide toutes les 4 secondes
let slideIntervalPlats = setInterval(function() { changeSlidePlats(1); }, 3000);

function changeSlidePlats(n) {
    clearInterval(slideIntervalPlats); // Stoppe le défilement automatique
    slideIndexPlats += n;
    showSlidePlats(slideIndexPlats);
    slideIntervalPlats = setInterval(function() { changeSlidePlats(1); }, 3000); // Redémarre le défilement automatique
}

function showSlidePlats(n) {
    const slides = document.getElementsByClassName("slides-plats")[0].getElementsByTagName("div");
    const totalSlides = slides.length;
    
    if (n > totalSlides) { slideIndexPlats = 1; }
    if (n < 1) { slideIndexPlats = totalSlides; }

    for (let i = 0; i < totalSlides; i++) {
        slides[i].classList.remove("slideIn-plats", "slideOut-plats");
        slides[i].style.visibility = "hidden";
        slides[i].style.opacity = "0";
    }

    slides[slideIndexPlats - 1].style.visibility = "visible";
    slides[slideIndexPlats - 1].style.opacity = "1";
    slides[slideIndexPlats - 1].classList.add("slideIn-plats");
}

showSlidePlats(slideIndexPlats); // Affiche le premier slide
