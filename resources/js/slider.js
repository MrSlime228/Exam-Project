document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('main-slider');
    if (!slider) return;

    const track = slider.querySelector('.slider-track');
    const slides = track.querySelectorAll('img');
    const total = slides.length;
    let index = 0;

    function show(i) {
        index = (i + total) % total;
        // Для Grid мы сдвигаем трек с помощью translateX, как и раньше
        track.style.transform = `translateX(-${index * 100}%)`;
    }

    slider.querySelector('.slider-btn.prev')?.addEventListener('click', () => show(index - 1));
    slider.querySelector('.slider-btn.next')?.addEventListener('click', () => show(index + 1));

    let timer = setInterval(() => show(index + 1), 3000);

    slider.addEventListener('mouseenter', () => clearInterval(timer));
    slider.addEventListener('mouseleave', () => {
        timer = setInterval(() => show(index + 1), 3000);
    });
});