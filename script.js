let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function changeSlide(direction) {
    currentSlide += direction;
    
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
    }

    document.querySelector('.slider').style.transform = `translateX(-${currentSlide * 100}%)`;
}

setInterval(() => changeSlide(1), 6000); // Changement automatique toutes les 3 secondes
