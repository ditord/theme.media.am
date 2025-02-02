<?php 

$the_excerpt = get_the_title(); 
$actual_link =  get_permalink() ;

?>
<div class="share_buttons">
    <a href="<?php echo $actual_link ?>" id="copy_link" class="share" target="_blank">
        <svg class="share_icon" width="16" height="14" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.115378 11.5961C0.115375 11.5962 0.115364 11.5961 0.115365 11.5961C0.947996 6.13304 4.2925 4.47411 6.26294 3.97017C6.83955 3.8227 7.2886 3.33033 7.28855 2.73517L7.28849 1.90351C7.28849 1.04155 8.28404 0.560618 8.95871 1.09724L14.092 5.16714C14.5427 5.52473 14.8055 6.06878 14.8055 6.64417C14.8055 7.21956 14.5427 7.76348 14.092 8.12119L8.95943 12.194C8.28404 12.7299 7.28921 12.249 7.28921 11.3877C7.28913 10.5477 6.57103 9.87358 5.75068 10.0541C3.77189 10.4896 2.38254 11.4178 1.45815 12.2952C0.90668 12.8169 0.000720866 12.3472 0.11539 11.5961C0.115391 11.5961 0.11538 11.5961 0.115378 11.5961Z" fill="white"/>
        </svg>
        <svg class="check_icon"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" >
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 12l5 5l10 -10" />
        </svg>
    </a>
    <a href="https://x.com/intent/post?url=<?php echo urlencode($actual_link); ?>&text=<?php echo urlencode($the_excerpt); ?>" class="x_link" target="_blank">
        <svg width="16" height="16" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.0532 3.4292H21.0433L14.5108 10.7361L22.1958 20.6792H16.1785L11.4655 14.6488L6.0728 20.6792H3.08087L10.0681 12.8636L2.6958 3.4292H8.86587L13.126 8.94124L18.0532 3.4292ZM17.0038 18.9277H18.6606L7.96558 5.08874H6.1876L17.0038 18.9277Z" fill="black"/>
        </svg>
    </a>
    <a href="https://t.me/share/url?url=<?php echo urlencode($actual_link); ?>&text=<?php echo urlencode($the_excerpt);?>" class="telegram_link" target="_blank">
        <svg width="16" height="16" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.2076 5.03367L19.9536 20.3791C19.7082 21.4622 19.0679 21.7317 18.1581 21.2216L13.2003 17.568L10.808 19.8689C10.5434 20.1336 10.3219 20.3551 9.81167 20.3551L10.1678 15.3057L19.3568 7.00237C19.7563 6.64621 19.2702 6.44882 18.7358 6.80503L7.37605 13.9579L2.48553 12.4272C1.42175 12.0951 1.40253 11.3634 2.70692 10.8532L21.8357 3.48375C22.7213 3.15164 23.4964 3.68104 23.2076 5.03367Z" fill="#192F4D"/>
        </svg>
    </a>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($actual_link); ?>" class="fb_link" target="_blank">
        <svg width="16" height="16" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.37737 5.88385V9.04955H7V12.9215H9.37737V24.4292H14.2608V12.9228H17.5384C17.5384 12.9228 17.8455 11.0662 17.9951 9.03581H14.2801V6.38794C14.2801 5.99246 14.8121 5.46091 15.3388 5.46091H18V1.4292H14.3812C9.25722 1.4292 9.37737 5.30502 9.37737 5.88385Z" fill="#192F4D"/>
        </svg>
    </a>
</div>
