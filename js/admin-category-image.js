(function ($) {
    'use strict';

    var frame;

    function updatePreview($field, imageId, imageUrl) {
        $field.find('.media-am-category-image-id').val(imageId);

        var $preview = $field.find('.media-am-category-image-preview');
        $preview.toggleClass('has-image', Boolean(imageUrl));
        $preview.html(imageUrl ? '<img src="' + imageUrl + '" alt="">' : '');

        $field.find('.media-am-category-image-remove').toggleClass('hidden', !imageUrl);
    }

    $(document).on('click', '.media-am-category-image-upload', function () {
        var $field = $(this).closest('.media-am-category-image-field');

        frame = wp.media({
            title: 'Choose category image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });

        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            var imageUrl = attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;

            updatePreview($field, attachment.id, imageUrl);
        });

        frame.open();
    });

    $(document).on('click', '.media-am-category-image-remove', function () {
        updatePreview($(this).closest('.media-am-category-image-field'), 0, '');
    });
})(jQuery);
