(function () {
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('[data-material-verification-form]');

        if (!form) {
            return;
        }

        const validateField = function (field) {
            const input = field.querySelector('input[type="text"], textarea');
            const isValid = input && input.value.trim() !== '';

            field.classList.toggle('is-danger', !isValid);

            return isValid;
        };

        const validateRadio = function (field) {
            const isValid = Boolean(field.querySelector('input[type="radio"]:checked'));

            field.classList.toggle('is-danger', !isValid);

            return isValid;
        };

        form.querySelectorAll('[data-required-field]').forEach(function (field) {
            const input = field.querySelector('input[type="text"], textarea');

            if (!input) {
                return;
            }

            input.addEventListener('input', function () {
                validateField(field);
            });
        });

        form.querySelectorAll('[data-required-radio] input[type="radio"]').forEach(function (input) {
            input.addEventListener('change', function () {
                const field = input.closest('[data-required-radio]');

                if (field) {
                    validateRadio(field);
                }
            });
        });

        form.addEventListener('submit', function (event) {
            const fields = Array.from(form.querySelectorAll('[data-required-field]'));
            const radioFields = Array.from(form.querySelectorAll('[data-required-radio]'));
            const fieldsValid = fields.map(validateField).every(Boolean);
            const radioValid = radioFields.map(validateRadio).every(Boolean);

            if (fieldsValid && radioValid) {
                return;
            }

            event.preventDefault();

            const firstInvalid = form.querySelector('.is-danger input, .is-danger textarea, .is-danger input[type="radio"]');

            if (firstInvalid) {
                firstInvalid.focus();
            }
        });
    });
})();
