document.addEventListener('DOMContentLoaded', function () {
    const userMenu = document.querySelector('.user-menu');
    userMenu.addEventListener('click', function () {
        const dropdown = userMenu.querySelector('.dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function (e) {
        if (!userMenu.contains(e.target)) {
            const dropdown = userMenu.querySelector('.dropdown-menu');
            dropdown.style.display = 'none';
        }
    });
});
