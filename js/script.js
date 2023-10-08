$(document).ready(function() {
    $('.burgerMenu').on('click',function(){
        $('.list').toggle(200)
    });

    $("header a, .list a").click(function(event) {
        event.preventDefault();
        let targetSection = $(this).attr("href");
        let targetOffset = $(targetSection).offset().top + 30;
        $("html, body").animate({
          scrollTop: targetOffset
        }, 700);
      });
      

        $('.colors').on('click', function () {
            $('.guyn').toggle(300);
          });
          


          $(document).on('click', function (event) {
            var target = $(event.target);
            if (!target.closest('.colors').length && !target.closest('.guyn').length) {
              $('.guyn').hide(300);
            }
          });


            const coloredDivs = $('.guyn');
            coloredDivs.on('click', function() {
              const backgroundColor = $(this).css('background-color');
              $('span,li,a,i,h4').css('color', backgroundColor);
            });
            
            
    });
$(document).scroll(function () {
    let sections = document.querySelectorAll('.slide div')
    sections.forEach(item => {
        if (item.getBoundingClientRect().top <= screen.height - 40) {
            if (item.className == 'left') {
                item.classList.add('animate__animated', 'animate__fadeInLeftBig')
            }
            else if (item.className == 'right') {
                item.classList.add('animate__animated', 'animate__fadeInRightBig')
            }
            else {
                item.classList.add('animate__animated', 'animate__fadeInUp')
            }

            item.style.opacity = 1
        }
        
        if(item.getBoundingClientRect().top >= screen.height){
            item.classList.remove('animate__animated','animate__fadeInUp', 'animate__fadeInRightBig', 'animate__fadeInLeftBig')
            item.style.opacity = 0
        }
    })
});