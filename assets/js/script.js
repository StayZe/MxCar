function left() {
    const WidthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content_item').scrollLeft -= WidthSlider;
}

function right() {
    const WidthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content_item').scrollLeft += WidthSlider;
}