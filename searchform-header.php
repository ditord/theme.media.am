<form action="<?php lang('/','/en') ?>" method="get">
    <input type="text" name="s" id="search" placeholder="<?php lang('որոնում','search') ?>" class="media_am_text_input" value="<?php the_search_query(); ?>" />
    <input type="hidden" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>" /> 
    <div class="close_search">
         <img class="header_close_icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/close_menu.svg" height="48px" width="48px">
    </div>
    <input type="submit" class="media_am_button" style="display: none;" value="<?php lang('Որոնել','Search') ?>" />
</form>