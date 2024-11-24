document.addEventListener('DOMContentLoaded', () => {
    // Close all dropdowns when clicking outside
    document.addEventListener('click', (event) => {
        const dropdowns = document.querySelectorAll('.dropdown-menu.active');
        dropdowns.forEach((dropdown) => {
            if (!dropdown.parentElement.contains(event.target)) {
                dropdown.classList.remove('active');
            }
        });
    });
});

// Toggle dropdown visibility
function toggleDropdown(element) {
    const dropdownMenu = element.nextElementSibling; // Find the dropdown menu associated with the clicked element
    const activeDropdowns = document.querySelectorAll('.dropdown-menu.active');

    // Close other open dropdowns
    activeDropdowns.forEach((dropdown) => {
        if (dropdown !== dropdownMenu) {
            dropdown.classList.remove('active');
        }
    });

    // Toggle the current dropdown's visibility
    dropdownMenu.classList.toggle('active');
}

function toggleMenu() {
    const menu = document.querySelector('.drop-down-menu');
    menu.classList.toggle('active'); // Toggle the 'active' class to show/hide the menu
}

// Close the menu when clicking outside
document.addEventListener('click', (event) => {
    const menu = document.querySelector('.drop-down-menu');
    const barsIcon = document.querySelector('.fa-bars');

    if (!menu.contains(event.target) && event.target !== barsIcon) {
        menu.classList.remove('active'); // Hide the menu
    }
});
