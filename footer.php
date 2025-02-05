
<footer class="footer">
    <div class="footer_container">
        <div class="footer_menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer'
            ));
            ?>
        </div>
        <div class="footer_soc_links">
            <div class="footer_soc_links_flex">
              <?php if(get_theme_mod('footer_facebook'))  { ?>
                <a href="<?php echo get_theme_mod('footer_facebook') ?>" target="_blank">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.37737 5.88385V9.04955H7V12.9215H9.37737V24.4292H14.2608V12.9228H17.5384C17.5384 12.9228 17.8455 11.0662 17.9951 9.03581H14.2801V6.38794C14.2801 5.99246 14.8121 5.46091 15.3388 5.46091H18V1.4292H14.3812C9.25722 1.4292 9.37737 5.30502 9.37737 5.88385Z" fill="#192F4D" />
                    </svg>
                </a>
                <div class="footer_soc_links_separator"></div>
                <?php }?>
                <?php if(get_theme_mod('footer_x'))  { ?>
                <a href="<?php echo get_theme_mod('footer_x') ?>" target="_blank">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.0532 3.4292H21.0433L14.5108 10.7361L22.1958 20.6792H16.1785L11.4655 14.6488L6.0728 20.6792H3.08087L10.0681 12.8636L2.6958 3.4292H8.86587L13.126 8.94124L18.0532 3.4292ZM17.0038 18.9277H18.6606L7.96558 5.08874H6.1876L17.0038 18.9277Z" fill="black" />
                    </svg>
                </a>
                <div class="footer_soc_links_separator"></div>
                <?php } ?>
                <?php if(get_theme_mod('footer_telegram'))  { ?>
                <a href="<?php echo get_theme_mod('footer_telegram') ?>" target="_blank">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.2076 5.03367L19.9536 20.3791C19.7082 21.4622 19.0679 21.7317 18.1581 21.2216L13.2003 17.568L10.808 19.8689C10.5434 20.1336 10.3219 20.3551 9.81167 20.3551L10.1678 15.3057L19.3568 7.00237C19.7563 6.64621 19.2702 6.44882 18.7358 6.80503L7.37605 13.9579L2.48553 12.4272C1.42175 12.0951 1.40253 11.3634 2.70692 10.8532L21.8357 3.48375C22.7213 3.15164 23.4964 3.68104 23.2076 5.03367Z" fill="#192F4D" />
                    </svg>
                </a>
                <div class="footer_soc_links_separator"></div>
                <?php } ?>
                <?php if(get_theme_mod('footer_youtube'))  { ?>
                <a href="<?php echo get_theme_mod('footer_youtube') ?>" target="_blank">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_62_504)">
                            <path d="M24.2731 7.62925C24.2731 7.62925 24.0388 5.97456 23.3169 5.248C22.4028 4.29175 21.381 4.28706 20.9122 4.23081C17.556 3.98706 12.5169 3.98706 12.5169 3.98706H12.5075C12.5075 3.98706 7.46846 3.98706 4.11221 4.23081C3.64346 4.28706 2.62158 4.29175 1.70752 5.248C0.985645 5.97456 0.755957 7.62925 0.755957 7.62925C0.755957 7.62925 0.512207 9.57456 0.512207 11.5152V13.3339C0.512207 15.2746 0.75127 17.2199 0.75127 17.2199C0.75127 17.2199 0.985644 18.8746 1.70283 19.6011C2.61689 20.5574 3.81689 20.5246 4.35127 20.6277C6.27314 20.8105 12.5122 20.8667 12.5122 20.8667C12.5122 20.8667 17.556 20.8574 20.9122 20.6183C21.381 20.5621 22.4028 20.5574 23.3169 19.6011C24.0388 18.8746 24.2731 17.2199 24.2731 17.2199C24.2731 17.2199 24.5122 15.2792 24.5122 13.3339V11.5152C24.5122 9.57456 24.2731 7.62925 24.2731 7.62925ZM10.0325 15.5417V8.79644L16.5153 12.1808L10.0325 15.5417Z" fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_62_504">
                                <rect width="24" height="24" fill="white" transform="translate(0.512207 0.429199)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <?php }?>
                <?php if(get_theme_mod('footer_instagram'))  { ?>
                <div class="footer_soc_links_separator"></div>
                <a href="<?php echo get_theme_mod('footer_instagram') ?>" target="_blank">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_62_508)">
                            <path d="M12.5361 2.59014C15.7424 2.59014 16.1221 2.6042 17.383 2.66045C18.5549 2.71201 19.1877 2.90889 19.6096 3.07295C20.1674 3.28857 20.5705 3.55107 20.9877 3.96826C21.4096 4.39014 21.6674 4.78857 21.883 5.34639C22.0471 5.76826 22.2439 6.40576 22.2955 7.57295C22.3518 8.83857 22.3658 9.21826 22.3658 12.4198C22.3658 15.6261 22.3518 16.0058 22.2955 17.2667C22.2439 18.4386 22.0471 19.0714 21.883 19.4933C21.6674 20.0511 21.4049 20.4542 20.9877 20.8714C20.5658 21.2933 20.1674 21.5511 19.6096 21.7667C19.1877 21.9308 18.5502 22.1276 17.383 22.1792C16.1174 22.2354 15.7377 22.2495 12.5361 22.2495C9.32988 22.2495 8.9502 22.2354 7.68926 22.1792C6.51738 22.1276 5.88457 21.9308 5.4627 21.7667C4.90488 21.5511 4.50176 21.2886 4.08457 20.8714C3.6627 20.4495 3.40488 20.0511 3.18926 19.4933C3.0252 19.0714 2.82832 18.4339 2.77676 17.2667C2.72051 16.0011 2.70645 15.6214 2.70645 12.4198C2.70645 9.21357 2.72051 8.83389 2.77676 7.57295C2.82832 6.40107 3.0252 5.76826 3.18926 5.34639C3.40488 4.78857 3.66738 4.38545 4.08457 3.96826C4.50645 3.54639 4.90488 3.28857 5.4627 3.07295C5.88457 2.90889 6.52207 2.71201 7.68926 2.66045C8.9502 2.6042 9.32988 2.59014 12.5361 2.59014ZM12.5361 0.429199C9.27832 0.429199 8.87051 0.443262 7.59082 0.499512C6.31582 0.555762 5.43926 0.762012 4.67988 1.05732C3.8877 1.3667 3.21738 1.77451 2.55176 2.44482C1.88145 3.11045 1.47363 3.78076 1.16426 4.56826C0.868945 5.33232 0.662695 6.2042 0.606445 7.4792C0.550195 8.76357 0.536133 9.17139 0.536133 12.4292C0.536133 15.687 0.550195 16.0948 0.606445 17.3745C0.662695 18.6495 0.868945 19.5261 1.16426 20.2854C1.47363 21.0776 1.88145 21.7479 2.55176 22.4136C3.21738 23.0792 3.8877 23.4917 4.6752 23.7964C5.43926 24.0917 6.31113 24.2979 7.58613 24.3542C8.86582 24.4104 9.27363 24.4245 12.5314 24.4245C15.7893 24.4245 16.1971 24.4104 17.4768 24.3542C18.7518 24.2979 19.6283 24.0917 20.3877 23.7964C21.1752 23.4917 21.8455 23.0792 22.5111 22.4136C23.1768 21.7479 23.5893 21.0776 23.8939 20.2901C24.1893 19.5261 24.3955 18.6542 24.4518 17.3792C24.508 16.0995 24.5221 15.6917 24.5221 12.4339C24.5221 9.17607 24.508 8.76826 24.4518 7.48857C24.3955 6.21357 24.1893 5.33701 23.8939 4.57764C23.5986 3.78076 23.1908 3.11045 22.5205 2.44482C21.8549 1.7792 21.1846 1.3667 20.3971 1.06201C19.633 0.766699 18.7611 0.560449 17.4861 0.504199C16.2018 0.443262 15.7939 0.429199 12.5361 0.429199Z" fill="#000100" />
                            <path d="M12.5361 6.26514C9.13301 6.26514 6.37207 9.02607 6.37207 12.4292C6.37207 15.8323 9.13301 18.5933 12.5361 18.5933C15.9393 18.5933 18.7002 15.8323 18.7002 12.4292C18.7002 9.02607 15.9393 6.26514 12.5361 6.26514ZM12.5361 16.4276C10.3283 16.4276 8.5377 14.637 8.5377 12.4292C8.5377 10.2214 10.3283 8.43076 12.5361 8.43076C14.7439 8.43076 16.5346 10.2214 16.5346 12.4292C16.5346 14.637 14.7439 16.4276 12.5361 16.4276Z" fill="#000100" />
                            <path d="M20.383 6.02134C20.383 6.81822 19.7361 7.46041 18.9439 7.46041C18.1471 7.46041 17.5049 6.81353 17.5049 6.02134C17.5049 5.22446 18.1518 4.58228 18.9439 4.58228C19.7361 4.58228 20.383 5.22915 20.383 6.02134Z" fill="#000100" />
                        </g>
                        <defs>
                            <clipPath id="clip0_62_508">
                                <rect width="24" height="24" fill="white" transform="translate(0.536133 0.429199)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <?php }?>
                <?php if(get_theme_mod('footer_vim'))  { ?>
                <div class="footer_soc_links_separator"></div>
                <a href="<?php echo get_theme_mod('footer_vim') ?>" target="_blank">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_62_514)">
                            <path d="M0.560059 7.65914L1.52906 8.93564C1.52906 8.93564 3.53906 7.35014 4.20806 8.13914C4.88606 8.93564 7.45256 18.4996 8.30156 20.2681C9.04256 21.8176 11.0991 23.8621 13.3461 22.4041C15.6141 20.9371 23.1006 14.5441 24.4416 6.97964C25.7796 -0.571359 15.4176 1.00964 14.3316 7.59164C17.0646 5.95064 18.5376 8.26364 17.1366 10.8781C15.7326 13.5031 14.4441 15.2146 13.7766 15.2146C13.1211 15.2146 12.6021 13.4536 11.8341 10.3966C11.0466 7.23014 11.0466 1.52114 7.75256 2.16914C4.63856 2.78414 0.560059 7.65914 0.560059 7.65914Z" fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_62_514">
                                <rect width="24" height="24" fill="white" transform="translate(0.560059 0.429199)" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <?php } ?>
            </div>
        </div>

        <div class="footer_description">

            <p class="footer_description_p1">
                <?php lang(get_theme_mod('footer_p1_arm'),get_theme_mod('footer_p1_eng'))?>
            </p>
            <p class="footer_description_p2">
                <?php lang(get_theme_mod('footer_p2_arm'),get_theme_mod('footer_p2_eng'))?>
            </p>
        </div>

        <?php 
            $internews_url = get_theme_mod('footer_internews');
            $usaid_url = get_theme_mod('footer_usaid');
            $mic_url = get_theme_mod('footer_mic'); 
        ?>
        <?php if($internews_url || $usaid_url || $mic_url):?>
            <div class="footer_sponsor_logos">
                <?php if($internews_url):?>
                    <a href="<?php echo $internews_url ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/internews.svg"
                        class="footer_internews_logo"
                        alt="MIC logo"  width="148px">
                    </a> 
                <?php endif ?>   
                <?php if($usaid_url):?> 
                    <a href="<?php echo $usaid_url ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/usaid.svg" 
                        class="footer_usaid_logo"
                        alt="MIC logo"  width="148px">
                    </a>
                <?php endif ?>
                <?php if($mic_url): ?> 
                    <a href="<?php echo $mic_url ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/mic_logo_eng.svg"
                        class="footer_mic_logo"
                        alt="MIC logo"  width="148px">
                    </a>
                <?php endif ?>    
            </div>
        <?php endif ?>    
        <div class="footer_matemat">
            <p>Modernized by <a href="https://matemat.io/" target="_blank">MATEMAT</a></p>
        </div>
    </div>
</footer>
<?php wp_footer() ?>


</body>

</html>