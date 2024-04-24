function left() {
    const WidthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content_item').scrollLeft -= WidthSlider;
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
