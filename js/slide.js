// window.addEventListener('load', function () {
//    var slide = document.querySelector('.content');
//    var butt = document.querySelector('.explore');
//    var icons = document.querySelector('.icons');
// //    butt.style.marginLeft = "70px";
//    slide.style.marginLeft = "70px";
//    icons.style.right= "100px";
// });
// let box = document.querySelector('.login-form');
// let logbox = document.querySelector('.logbox');
window.addEventListener('scroll', function (e) {
    let navList = document.querySelectorAll('.list li a');
    var myNav = document.querySelector('header');
    if (document.documentElement.scrollTop || document.body.scrollTop > window.innerHeight) {
        myNav.classList.add('nav-colored');
        myNav.classList.remove('nav-transparent');
        const mp = window.matchMedia("(min-width: 1500px)");
        if (mp.matches) {
            navList.forEach(navList => {
                navList.classList.add('hover-orange');
                navList.classList.remove('hover-black');
            });
        }

    } else {
        const mp = window.matchMedia("(min-width: 1500px)");
        if (mp.matches) {
            navList.forEach(navList => {
                navList.mouseOver =
                    navList.classList.add('hover-black');
                navList.classList.remove('hover-orange');
            });
        } else {

        }
        myNav.classList.add('nav-transparent');
        myNav.classList.remove('nav-colored');
    }
});




function close() {
    let box = document.querySelector('.login-form');
    let logbox = document.querySelector('.logbox');
    logbox.style.transform = "scale(0)";
    box.style.visibility = "hidden";
    box.style.opacity = "0";
}

// document.querySelector('#loginbook').addEventListener('click', open);

function open(e) {
    // e.preventDefault();
    if (e == 1) {
        let errory = document.querySelector('#error-head');
        errory.innerHTML = "Empty Fields!";
        errory.style.display = "block";
    } 
    if (e == 2) {
        let errory = document.querySelector('#error-head');
        errory.innerHTML = "Wrong Password!";
        errory.style.display = "block";
    } 
    if (e == 3) {
        let errory = document.querySelector('#error-head');
        errory.innerHTML = " Email not registered!";
        errory.style.display = "block";
    } 
    let box = document.querySelector('.login-form');
    let logbox = document.querySelector('.logbox');
    logbox.style.transform = "scale(1)";
    box.style.visibility = "visible";
    box.style.opacity = "1";

}
// window.onclick = function (e) {
//     let box = document.querySelector('.login-form');

//     if (e.target == box) {
//         close();
//     }
// }

window.addEventListener('mousedown', function (e) {
    let box = document.querySelector('.login-form');

    if (e.target == box) {
        close();
    }
});


// sos navigation menu
function navMenu() {
    let navBar = document.querySelector('.navigation');
    let darkNav = document.querySelector('.dark-nav');
    navBar.style.right = "0px";
    navBar.style.opacity = "1";
    darkNav.style.opacity = "1";
    darkNav.style.visibility = "visible";
}
function navClose() {
    let navBar = document.querySelector('.navigation');
    let darkNav = document.querySelector('.dark-nav');
    navBar.style.right = "-45%";
    darkNav.style.opacity = "0";
    darkNav.style.visibility = "hidden";
    const mp = window.matchMedia("(min-width: 1500px)");
    if (mp.matches) {
        navBar.style.opacity = "1";

    } else {
        navBar.style.opacity = "0";

    }
}


// ~ Scrollable Navbar






// window.addEventListener('scroll', function(event) { // To listen for event
//     event.preventDefault();

//     if (window.scrollY >= 50) { // Just an example
//         myNav.style.backgroundColor = '#000'; // or default color

//     } else {
//         myNav.style.backgroundColor = 'transparent';
//     }
// });




// ~ Hamburger menu
// let navBar = document.querySelector('.navigation');
document.querySelector('.dark-nav').addEventListener('click', navClose);

// calling function
document.querySelector('#hamburger').addEventListener('click', navMenu);
document.querySelector('#close-nav').addEventListener('click', navClose);
document.querySelector('.list').addEventListener('click', navClose);



document.querySelector('#login').addEventListener('click', open);

document.querySelector('#close').addEventListener('click', close);
document.querySelector('#check-log').addEventListener('click', open);
