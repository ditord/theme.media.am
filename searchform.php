<form action="<?php lang('/','/en') ?>" method="get">
    <input type="text" name="s" id="search" class="media_am_text_input" value="<?php the_search_query(); ?>" />
    <input type="hidden" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>" /> 
    <input type="submit" class="media_am_button" value="<?php lang('Որոնել','Search') ?>" />
</form>