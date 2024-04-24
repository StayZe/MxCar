function left() {
    const WidthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content_item').scrollLeft -= WidthSlider;
}

function right() {
    const WidthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content_item').scrollLeft += WidthSlider;
    if (WidthSlider.scrollLeft + slider.offsetWidth >= maxScroll) {
        // Si nous sommes à la fin du slider, revenir au début
        WidthSlider.scrollLeft = 0;
    } else {
        // Sinon, faire défiler normalement
        sliderContent.scrollLeft += WidthSlider;
    }
}