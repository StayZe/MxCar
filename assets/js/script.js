function left() {
    const sliderContent = document.querySelector('.slider_content_item');
    const widthSlider = document.querySelector('.slider').offsetWidth;
    if (sliderContent.scrollLeft === 0) {
        // Si nous sommes au début du slider, aller à la fin
        sliderContent.scrollLeft = sliderContent.scrollWidth;
    } else {
        // Sinon, faire défiler normalement
        sliderContent.scrollLeft -= widthSlider;
    }
}


function right() {
    const slider = document.querySelector('.slider');
    const sliderContent = document.querySelector('.slider_content_item');
    const widthSlider = slider.offsetWidth;
    const maxScroll = sliderContent.scrollWidth - slider.offsetWidth;
    if (sliderContent.scrollLeft + slider.offsetWidth > maxScroll) {
        // Si nous sommes à la fin du slider, revenir au début
        sliderContent.scrollLeft = 0;
    } else {
        // Sinon, faire défiler normalement
        sliderContent.scrollLeft += widthSlider;
    }    
}

document.addEventListener('keydown', function(event) {
    if (event.keyCode === 37) {
        // Touche de direction gauche
        left();
    } else if (event.keyCode === 39) {
        // Touche de direction droite
        right();
    }
});
