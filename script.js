const navbarItems = document.querySelectorAll('.navbar ul li');

navbarItems.forEach(item => {
    
    const subNavbar = item.querySelector('.sub-navbar');

    item.addEventListener('mouseenter', () => {
        subNavbar.style.display = 'block';
    });

    item.addEventListener('mouseleave', () => {
        subNavbar.style.display = 'none';
    });

    item.addEventListener('click', () => {
        subNavbar.style.display = subNavbar.style.display === 'block' ? 'none' : 'block';
    });
});
