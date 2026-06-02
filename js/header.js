(function () {
  document.addEventListener('DOMContentLoaded', function () {
    const htmlElement = document.documentElement;
    const header = document.querySelector('.header');
    const headerMenu = document.querySelector('.header_menu');
    const hamburger = document.querySelector('.hamburger');
    const backgroundGrey = document.querySelector('.background-grey');
    const languageDropdown = document.querySelector('.header_language_dropdown');
    const languageButton = document.querySelector('.header_language_button');

    updateHeaderState();
    document.addEventListener('scroll', updateHeaderState, { passive: true });

    if (hamburger) {
      hamburger.addEventListener('click', toggleMenu);
    }

    if (backgroundGrey) {
      backgroundGrey.addEventListener('click', closeMenu);
    }

    if (languageButton && languageDropdown) {
      languageButton.addEventListener('click', function (event) {
        event.stopPropagation();
        languageDropdown.classList.toggle('active');
        languageButton.setAttribute('aria-expanded', languageDropdown.classList.contains('active') ? 'true' : 'false');
      });
    }

    document.addEventListener('click', function (event) {
      if (languageDropdown && !event.target.closest('.header_language_dropdown')) {
        languageDropdown.classList.remove('active');
        if (languageButton) {
          languageButton.setAttribute('aria-expanded', 'false');
        }
      }
    });

    function updateHeaderState() {
      if (!header) {
        return;
      }

      if (window.scrollY > 0) {
        header.classList.add('small');
      } else {
        header.classList.remove('small');
      }
    }

    function toggleMenu() {
      if (headerMenu && headerMenu.classList.contains('active')) {
        closeMenu();
      } else {
        openMenu();
      }
    }

    function openMenu() {
      if (!headerMenu || !hamburger || !header) {
        return;
      }

      headerMenu.classList.add('active');
      header.classList.add('menu-open');
      hamburger.classList.add('is-active');
      hamburger.setAttribute('aria-expanded', 'true');
      htmlElement.classList.add('no-scroll');

      if (backgroundGrey) {
        backgroundGrey.style.display = 'block';
      }

      const searchInput = headerMenu.querySelector('input[type="text"], input[type="search"]');
      if (searchInput) {
        window.setTimeout(function () {
          searchInput.focus();
        }, 100);
      }
    }

    function closeMenu() {
      if (!headerMenu || !hamburger || !header) {
        return;
      }

      headerMenu.classList.remove('active');
      header.classList.remove('menu-open');
      hamburger.classList.remove('is-active');
      hamburger.setAttribute('aria-expanded', 'false');
      htmlElement.classList.remove('no-scroll');

      if (backgroundGrey) {
        backgroundGrey.style.display = 'none';
      }
    }
  });
})();
