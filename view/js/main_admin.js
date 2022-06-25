window.onload = function() {
    let telegram = document.querySelector('.telegram');
    let toggleTelegram = (element) => {
        element.classList.toggle('transform');
        element.classList.toggle('transform-clicked');
    
    }
    telegram.addEventListener('click', function() {
        toggleTelegram(telegram);
        setTimeout(function() {
            window.open('https://t.me/Yev694', '_blank');
            toggleTelegram(telegram);
        }, 1100);
    });
}