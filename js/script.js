(function () {
  

  document.addEventListener('DOMContentLoaded', function () {
    
      if(this.querySelector('body > div.page_content > div.posts_carousel')){
        const swiper = new Swiper('.swiper', {
          direction: 'horizontal',
          loop: true,
          slidesPerView: 1,
          spaceBetween: 20,
          autoplay:true,
          centeredSlides:true,
          breakpoints:{
            560:{
              slidesPerView: 2,
              centeredSlides:false
            }
          },
        });
      }
      
      const copyLink = this.querySelector('#copy_link') 
      if(copyLink){
        copyLink.addEventListener("click", function (event) {
        
          event.preventDefault();
      
      
          const linkToCopy = copyLink.getAttribute("href");
      
          //console.log(linkToCopy)
          navigator.clipboard.writeText(linkToCopy)
            .then(() => {
              
              copyLink.classList.add("active");
              setTimeout(() => {
                copyLink.classList.remove("active");
              }, 1000); 
            })
            .catch(err => {
              console.error("Failed to copy text: ", err);
            });
        });
      
      }
    
    
      document.querySelectorAll('.post-block, .podcast_block').forEach(function(postBlock) {
          postBlock.addEventListener('click', function(event) {
              if (!event.target.closest('a') && postBlock.dataset.url && !event.target.closest('p') && !event.target.closest('span')) {
                window.location.href = postBlock.dataset.url;
            }
          });
      });
      
      const featuredPost = document.querySelector('.posts_featured > .post_block');
      if(featuredPost){
        featuredPost.addEventListener('click',function(event){
          if (!event.target.closest('a') && featuredPost.dataset.url) {
            window.location.href = featuredPost.dataset.url;
           }
        })
      }
      
      // Dropdown descriptions
      const describables = document.querySelectorAll('.has_desc')
       describables.forEach((element,currentIndex)=>{
        element.addEventListener('click',function(){
          element.classList.toggle('force_active')
          element.querySelector('.tooltip_desc').classList.toggle('force_active')
          
        })
      }) 
      describables.forEach((element)=>{
        element.addEventListener('mouseenter',function(){
          element.classList.add('active')
          element.querySelector('.tooltip_desc').classList.add('active')
          element.querySelector('.tooltip_desc').classList.remove('closing')
        })
        element.addEventListener('mouseleave',function(){
          element.classList.remove('active')
          if(!element.classList.contains('force_active'))element.querySelector('.tooltip_desc').classList.add('closing')
          element.querySelector('.tooltip_desc').classList.remove('active')
        })
      })
      function removeForceActive(event){
        if(event.target.classList.contains('tooltip_desc') || 
          event.target.classList.contains('has_desc') || 
          event.target.closest('.tooltip_desc') 
        )return
        describables.forEach((element,index)=>{
          element.classList.remove('force_active')
          element.querySelector('.tooltip_desc').classList.remove('force_active')
          element.querySelector('.tooltip_desc').classList.add('closing')  
        })
      }

      document.addEventListener('click', removeForceActive);
      document.addEventListener('touchstart', removeForceActive);

      function alignTooltips(){
        const viewWidth = window.innerWidth
        const tooltip_size = viewWidth < 769 ? 250 : 300
        describables.forEach((element)=>{
            const rect = element.getBoundingClientRect()
            element.querySelector('.tooltip_desc').classList.remove('left_tooltip','middle_tooltip')
            if(viewWidth - (rect.left+tooltip_size) < 20 && rect.right - tooltip_size <50){
              element.querySelector('.tooltip_desc').classList.add('middle_tooltip')
            } else if(viewWidth - (rect.left+tooltip_size) < 20){
              element.querySelector('.tooltip_desc').classList.add('left_tooltip')
            }
        })
      }
      alignTooltips()
      window.addEventListener('resize',alignTooltips)

      const calendarCells = document.querySelectorAll('.calendar_container td');
      calendarCells.forEach(td => {
          if (td.innerHTML.trim() === '&nbsp;') {
              td.innerHTML = '';
          }
      });

      if (document.documentElement.lang === "hy-AM") {
      const month_map = {
        'January' : 'Հունվար',
        'February' : 'Փետրվար',
        'March' : 'Մարտ',
        'April' : 'Ապրիլ',
        'May' : 'Մայիս',
        'June' : 'Հունիս',
        'July' : 'Հուլիս',
        'August' : 'Օգոստոս',
        'September' : 'Սեպտեմբեր',
        'October' : 'Հոկտեմբեր',
        'November' : 'Նոյեմբեր',
        'December' : 'Դեկտեմբեր',
        'Jan' : 'Հուն',
        'Feb' : 'Փետ',
        'Mar' : 'Մար',
        'Apr' : 'Ապր',
        'May' : 'Մայ',
        'Jun' : 'Հուն',
        'Jul' : 'Հուլ',
        'Aug' : 'Օգո',
        'Sep' : 'Սեպ',
        'Oct' : 'Հոկ',
        'Nov' : 'Նոյ',
        'Dec' : 'Դեկ'
      }
      const calendarMonth = document.querySelector('#wp-calendar caption');
      if(calendarMonth){
        const monthValue = calendarMonth.innerHTML.split(' ')
        calendarMonth.innerHTML = month_map[monthValue[0]] +' '+ monthValue[1]
      }
      
      const prev_button = document.querySelector('.wp-calendar-nav-prev a')
      const next_button = document.querySelector('.wp-calendar-nav-next a')

      if(prev_button){
        const prevValue = prev_button.innerHTML.split(' ')
        prev_button.innerHTML = prevValue[0]+' '+ month_map[prevValue[1]]
      }
      if(next_button){
        const nextValue = next_button.innerHTML.split(' ')
        next_button.innerHTML =  month_map[nextValue[0]] + ' ' + nextValue[1]
      }
    }
  })
})();
