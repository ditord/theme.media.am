(function ($) {
    var request = null;

    function openModal() {
        $('.media-am-post-block-modal').attr('aria-hidden', 'false').addClass('is-open');
        $('#media-am-post-block-search').val('').trigger('focus');
        searchPosts('');
    }

    function closeModal() {
        $('.media-am-post-block-modal').attr('aria-hidden', 'true').removeClass('is-open');
    }

    function insertIntoEditor(shortcode) {
        var editor = window.tinymce && window.tinymce.get('content');
        var textarea = document.getElementById('content');

        if (editor && !editor.isHidden()) {
            editor.execCommand('mceInsertContent', false, shortcode);
            closeModal();
            return;
        }

        if (textarea) {
            var start = textarea.selectionStart || 0;
            var end = textarea.selectionEnd || 0;
            var value = textarea.value;

            textarea.value = value.substring(0, start) + shortcode + value.substring(end);
            textarea.selectionStart = textarea.selectionEnd = start + shortcode.length;
            textarea.focus();
            closeModal();
            return;
        }

        closeModal();
    }

    function renderResults(posts) {
        var $results = $('.media-am-post-block-results');

        if (!posts.length) {
            $results.html('<p class="media-am-post-block-empty">' + escapeHtml(mediaAmPostBlockInserter.strings.noPostsFound) + '</p>');
            return;
        }

        $results.html(posts.map(function (post) {
            return '<button type="button" class="media-am-post-block-result" data-id="' + post.id + '">' +
                '<span class="media-am-post-block-result__title">' + escapeHtml(post.title) + '</span>' +
                '<span class="media-am-post-block-result__meta">' + escapeHtml(mediaAmPostBlockInserter.strings.idLabel) + ' ' + post.id + ' | ' + post.date + '</span>' +
            '</button>';
        }).join(''));
    }

    function searchPosts(search) {
        var $results = $('.media-am-post-block-results');
        $results.html('<p class="media-am-post-block-empty">' + escapeHtml(mediaAmPostBlockInserter.strings.searching) + '</p>');

        if (request) {
            request.abort();
        }

        request = $.ajax({
            url: mediaAmPostBlockInserter.ajaxUrl,
            method: 'GET',
            dataType: 'json',
            data: {
                action: 'media_am_post_block_search',
                nonce: mediaAmPostBlockInserter.nonce,
                search: search
            }
        }).done(function (response) {
            renderResults(response.success ? response.data : []);
        }).fail(function (_, status) {
            if (status !== 'abort') {
                $results.html('<p class="media-am-post-block-empty">' + escapeHtml(mediaAmPostBlockInserter.strings.searchFailed) + '</p>');
            }
        });
    }

    function escapeHtml(value) {
        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    $(document).on('click', '.media-am-post-block-open', openModal);
    $(document).on('click', '.media-am-post-block-close, .media-am-post-block-modal__backdrop', closeModal);
    $(document).on('click', '.media-am-post-block-result', function () {
        insertIntoEditor('[post_block id="' + $(this).data('id') + '"]');
    });
    $(document).on('keyup', function (event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });

    var searchTimer = null;
    $(document).on('input', '#media-am-post-block-search', function () {
        var value = $(this).val();
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function () {
            searchPosts(value);
        }, 250);
    });
})(jQuery);
