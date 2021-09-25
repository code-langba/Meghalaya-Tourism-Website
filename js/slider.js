const slides = document.querySelectorAll('.slide');
const textSlide = document.querySelectorAll('.landing-text');
const prev = document.querySelector('#prev');
const next = document.querySelector('#next');
const pause = document.querySelector('#pause');
const intervalTime = 6000;
let slideInterval;
let auto = true;

const nextSlide = () => {
    const display = document.querySelector('.display'); // Get the display class
    const view = document.querySelector('.view'); // Get the display class
    // Remove the class display
    display.classList.remove('display');
    view.classList.remove('view');
    // Check for next sibling
    if(display.nextElementSibling){
        // Add class to next sibling
        display.nextElementSibling.classList.add('display');
        view.nextElementSibling.classList.add('view');
    }
    else{
        // From the beginning
        slides[0].classList.add('display');
        textSlide[0].classList.add('view');
    }
    setTimeout(() => display.classList.remove('display'));
    setTimeout(() => view.classList.remove('view'));
}

const prevSlide = () => {
    const display = document.querySelector('.display'); // Get the display class
    const view = document.querySelector('.view'); // Get the display class
    // Remove the class display
    display.classList.remove('display');
    view.classList.remove('view');
    // Check for next sibling
    if(display.previousElementSibling){

        // Add class to next sibling
        display.previousElementSibling.classList.add('display');
        view.previousElementSibling.classList.add('view');
        
    }
    else{

        // From the beginning
        slides[slides.length - 1].classList.add('display');
        textSlide[slides.length - 1].classList.add('view');

    }
    setTimeout(() => display.classList.remove('display'));
    setTimeout(() => view.classList.remove('view'));
}

// Button Events
next.addEventListener('click', e => {
    nextSlide();
    if (auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});
prev.addEventListener('click', e => {
    prevSlide();
    if (auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});
// Automated slide
if(auto){
    // Run next slide at interval time
    slideInterval = setInterval(nextSlide, intervalTime);
}

// Play/Pause Slider
// pause.addEventListener('click', e => {
//     if (auto) {
//     clearInterval(slideInterval);
//     pause.textContent = "play";
//     auto = false;        
//     } else {
//     slideInterval = setInterval(nextSlide, intervalTime);
//     pause.textContent = "Pause";
//     auto = true;
//     }
// });

