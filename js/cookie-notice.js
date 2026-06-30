(function () {
    document.addEventListener('DOMContentLoaded', function () {
        const notice = document.querySelector('[data-cookie-notice]');
        const dismissButton = document.querySelector('[data-cookie-notice-dismiss]');
        const storageKey = 'media_am_cookie_notice_dismissed';

        if (!notice) {
            return;
        }

        try {
            if (window.localStorage.getItem(storageKey) === '1') {
                return;
            }
        } catch (error) {
            if (document.cookie.indexOf(storageKey + '=1') !== -1) {
                return;
            }
        }

        notice.hidden = false;

        animateNoticeIn();

        if (dismissButton) {
            dismissButton.addEventListener('click', function () {
                notice.hidden = true;

                try {
                    window.localStorage.setItem(storageKey, '1');
                } catch (error) {
                    document.cookie = storageKey + '=1; path=/; max-age=31536000; SameSite=Lax';
                }
            });
        }

        function animateNoticeIn() {
            const content = notice.querySelector('.cookie_notice__content');

            if (!notice.animate || !content || !content.animate) {
                return;
            }

            notice.animate(
                [
                    {transform: 'translateY(110%)'},
                    {transform: 'translateY(0)'},
                ],
                {
                    delay: 1590, // 1500 + original 90ms
                    duration: 360,
                    easing: 'ease-out',
                    fill: 'both',
                },
                {
                    duration: 520,
                    easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                    fill: 'both',
                }
            );

            content.animate(
                [
                    {opacity: 0, transform: 'translateY(1rem)'},
                    {opacity: 1, transform: 'translateY(0)'},
                ],
                {
                    duration: 360,
                    delay: 90,
                    easing: 'ease-out',
                    fill: 'both',
                }
            );
        }
    });
})();
