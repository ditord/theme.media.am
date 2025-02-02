(function () {
  document.addEventListener('DOMContentLoaded', function () {
      header_size();

      // Toggle search form
      document.querySelector('.header_open_search').addEventListener('click', function () {
          document.querySelector('.header_search_form').classList.toggle('active');
          document.querySelector('.header_search_container').classList.toggle('active');
          document.querySelector('header > nav > div.header_flex .header_project').classList.toggle('hidden');
          document.querySelector('header > nav > div.header_flex .header_mediaethics').classList.toggle('hidden');
          const searchInput = document.querySelector('.header_search_form.active input[type="text"]');
          if (searchInput) {
              searchInput.focus();
          }
      });

      
      document.querySelector('.close_search').addEventListener('click',function(e){
            document.querySelector('header > nav > div.header_flex .header_project').classList.remove('hidden');
            document.querySelector('header > nav > div.header_flex .header_mediaethics').classList.remove('hidden');
            document.querySelector('.header_search_form').classList.remove('active');
            document.querySelector('.header_search_container').classList.remove('active');
      })
      document.addEventListener('click', function (e) {
          if (!e.target.closest('.header_search_form') && !e.target.closest('.header_open_search')) {
              document.querySelector('header > nav > div.header_flex .header_project').classList.remove('hidden');
              document.querySelector('header > nav > div.header_flex .header_mediaethics').classList.remove('hidden');
              document.querySelector('.header_search_form').classList.remove('active');
              document.querySelector('.header_search_container').classList.remove('active');
          }
      });

      // Toggle menu and background overlay
      document.querySelector('nav button.hamburger').addEventListener('click', toggleMenu);
      document.querySelector('.background-grey').addEventListener('click', toggleMenu);
  });

  function toggleMenu() {
    const hasScrollbar = window.innerWidth > document.documentElement.clientWidth;
      const htmlElement = document.querySelector('html'); 
      const header = document.querySelector('header');
      document.querySelector('.header_menu').classList.toggle('active');
      htmlElement.classList.toggle('no-scroll');
     
      if (hasScrollbar && htmlElement.classList.contains('no-scroll') ) {
        html.style.paddingRight = '16px';
        header.style.paddingRight = '24px';
      }else{
        html.style.paddingRight = '';
        header.style.paddingRight = '';
      }
      const backgroundGrey = document.querySelector('.background-grey');
      if (backgroundGrey.style.display === 'block') {
          backgroundGrey.style.display = 'none';
      } else {
          backgroundGrey.style.display = 'block';
      }
      document.querySelector('nav button.hamburger').classList.toggle('is-active');
  }

  function header_size() {
      document.addEventListener('scroll', function () {
          if (window.scrollY !== 0) {
              document.querySelector('header').classList.add('small');
          } else {
              document.querySelector('header').classList.remove('small');
          }
      });
  }
})();
