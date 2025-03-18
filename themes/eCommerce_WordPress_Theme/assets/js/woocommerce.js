document.addEventListener('DOMContentLoaded', function () {
    let buyNowBtn = document.querySelector('.buy-now');
    
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function () {
            window.location.href = '/checkout/';
        });
    }
});