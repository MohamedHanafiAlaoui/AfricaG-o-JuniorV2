let images = document.querySelectorAll('.carousel-item');
let currentIndex = 0;

// function Special for slaider

    function showNextImage() {
        images[currentIndex].classList.remove('opacity-40');
        images[currentIndex].classList.add('opacity-40');

        let oldIndex = currentIndex;
        setTimeout(function () {
            images[oldIndex].classList.add('hidden');
        }, 500);

        currentIndex = (currentIndex + 1) % images.length;

        setTimeout(function () {
            images[currentIndex].classList.remove('hidden');
            setTimeout(function () {
                images[currentIndex].classList.add('opacity-40');
                images[currentIndex].classList.remove('opacity-0');
            }, 10);
        }, 500);

    }
    setInterval(showNextImage, 2000);

    let menuButton = document.getElementById('menu-btn');
    let mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

let mas=document.querySelector(".mas");
let Admin=document.querySelector(".Admin");
