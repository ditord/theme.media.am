## About

This is WordPress news site custom theme that uses plain CSS and js with a bundled swiper js library for sliders.
The website is multilingual and supports Armenian and English. There are appropriate helper functions in functions.php for translations.
Functions.php connects CSS and js based on the page. Website uses old classic editor.

For some custom texts or images we use customize_register and customizer.php file that adds inputs into Theme -> Customize.
For Advertisement blocks and calendar we use widgets.

PHP version: 8.2

## Rules

1. Every CSS that is page-specific should be included in functions.php only for that page.
2. If CSS file gets too big, ask for splitting into logically separate files.
3. We don't want here to have npm scripts, for new libraries we will use bundled versions but should avoid using new libraries.
4. For colours we have separate css variables file if new color is used need to be put there and used.
5. Use rem instead of px where possible.
6. If developer changes something on AI agent generated css explicitly ask before reverting/updating 