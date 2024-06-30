$(() => {
    // Ширина окна для ресайза
    WW = window.innerWidth || document.clientWidth || document.getElementsByTagName('body')[0].clientWidth
    WH = window.innerHeight || document.clientHeight || document.getElementsByTagName('body')[0].clientHeight
    BODY = document.getElementsByTagName('body')[0]
    OVERLAY = document.querySelector('.overlay')

    $(document).on('change', '.error', function() {
        $(this).removeClass('error');
    })
     $(document).on('keypress', '.error', function() {
        $(this).removeClass('error');
    })

    $('form button').on('click', function(event){
        event.preventDefault();

        var dataForAjax = "action=form&";
        var addressForAjax = myajax.url;
        var valid = true;
        
        $(this).closest('form').find('input:not([type=submit]),textarea, select').each(function(i, elem) {
            if (this.value.length < 3 && $(this).hasClass('required')) {
                valid = false;
                $(this).addClass('error');
            }
            if ($(this).attr('name') == 'email' && $(this).hasClass('required')) {
                var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
                if (!pattern.test($(this).val())) {
                    valid = false;
                    $(this).addClass('error');
                }
            }
            if ($(this).attr('name') == 'agree' && !$(this).prop("checked")) {
                $(this).addClass('error');
                valid = false;
            }

            if($(this).attr('name') == 'phone' && $(this).hasClass('required')) {
                if (this.value.replace(/[_-]/g, '').length!=16)
                {
                    valid = false;
                    $(this).addClass('error');
                }
            } 

            if (i > 0) {
                dataForAjax += '&';
            }
            dataForAjax += this.name + '=' + encodeURIComponent(this.value);
        })       

        if (!valid) {
            return false;
        }  

        $.ajax({
            type: 'POST',
            data: dataForAjax,
            url: addressForAjax,
            success: function(response) {
                $("form").trigger("reset");
                Fancybox.close()

                Fancybox.show([{
                    src: "#thanks",
                    type: 'inline'
                }])               
            }
        });  
    }); 



    // Моб. меню
    $('header .mob_menu_btn').click((e) => {
        e.preventDefault()
        $('header .mob_menu_btn').addClass('active')
        $('body').addClass('menu_open')
        $('header .menu').addClass('show')
        $('.overlay').fadeIn(300)
    })
    $('header .close_btn, .overlay').click((e) => {
        e.preventDefault()
        $('header .mob_menu_btn').removeClass('active')
        $('body').removeClass('menu_open')
        $('header .menu').removeClass('show')
        $('.overlay').fadeOut(300)
    })
    // Кастомный select
    $('select').niceSelect()
    let header = $('header');
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
            header.addClass('header_fixed');
        } else {
            header.removeClass('header_fixed');
        }
    });
    // Скрол к пунктам меню
    $(".scroll").on("click", function(e) {
        e.preventDefault();
        let id = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(id).offset().top - 80
        }, {
            duration: 400,
            easing: "swing"
        });
    });
    $('body').on('click', '.modal_link', function(e) {
        e.preventDefault()
        Fancybox.close(true)
        Fancybox.show([{
            src: $(this).data('content'),
            type: 'inline',
        }]);
    })
    
    // Fancybox
    Fancybox.defaults.autoFocus = false
    Fancybox.defaults.trapFocus = false
    Fancybox.defaults.dragToClose = false
    Fancybox.defaults.placeFocusBack = false
    Fancybox.defaults.l10n = {
        CLOSE: "Закрыть",
        NEXT: "Следующий",
        PREV: "Предыдущий",
        MODAL: "Вы можете закрыть это модальное окно нажав клавишу ESC"
    }
    Fancybox.defaults.template = {
        // closeButton: '<img src=images/close.png>',
        // 	spinner: '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="25 25 50 50" tabindex="-1"><circle cx="50" cy="50" r="20"/></svg>',
        // 	main: null
        closeButton: `<button data-fancybox-close class="f-button is-close-btn" title="Закрыть"><img src=https://app-data.ru/wp-content/themes/raten/images/close.svg></button>`
    }
    // Phone input mask
    const phoneInputs = document.querySelectorAll('input[type=tel]')
    if (phoneInputs) {
        phoneInputs.forEach(el => {
            IMask(el, {
                mask: '+{7} (000) 000-00-00',
                lazy: true
            })
        })
    }


    const swiper = new Swiper('.done .swiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        breakpoints: {
          479: {
            slidesPerView: 1,
            spaceBetween: 1,
          },
          767: {
            slidesPerView: 1,
            spaceBetween: 1,
          },
          1023: {
            slidesPerView: 1,
            spaceBetween: 0,
          },
        }
      });


    const projectsSliders = [],
        projects = document.querySelectorAll('.projects .swiper')
    projects.forEach(function(el, i) {
        el.classList.add('projects_s' + i)
        let options = {
            loop: true,
            speed: 500,
            watchSlidesProgress: true,
            slideActiveClass: 'active',
            slideVisibleClass: 'visible',
            breakpoints: {
                0: {
                    spaceBetween: 15,
                    slidesPerView: 1
                },
                670: {
                    spaceBetween: 15,
                    slidesPerView: 2
                },
                768: {
                    spaceBetween: 15,
                    slidesPerView: 2
                },
                970: {
                    spaceBetween: 30,
                    slidesPerView: 3
                },
                1300: {
                    spaceBetween: 30,
                    slidesPerView: 3
                }
            },
            pagination: {
                el: '.projects .swiper-pagination',
                type: 'bullets',
                clickable: true,
            }
        }
        projectsSliders.push(new Swiper('.projects_s' + i, options))
    })
    const benifitsSliders = [],
        benifits = document.querySelectorAll('.benifits .swiper')
    benifits.forEach(function(el, i) {
        el.classList.add('benifits_s' + i)
        let options = {
            loop: true,
            speed: 500,
            watchSlidesProgress: true,
            slideActiveClass: 'active',
            slideVisibleClass: 'visible',
            breakpoints: {
                0: {
                    spaceBetween: 15,
                    slidesPerView: 1
                },
                600: {
                    spaceBetween: 15,
                    slidesPerView: 2
                },
                768: {
                    spaceBetween: 15,
                    slidesPerView: 2
                },
                970: {
                    spaceBetween: 30,
                    slidesPerView: 3
                },
                1300: {
                    spaceBetween: 30,
                    slidesPerView: 3
                }
            },
            pagination: {
                el: '.benifits .swiper-pagination',
                type: 'bullets',
                clickable: true,
            }
        }
        benifitsSliders.push(new Swiper('.benifits_s' + i, options))
    })
    const technologySliders = [],
        technology = document.querySelectorAll('.technology .swiper')
    technology.forEach(function(el, i) {
        el.classList.add('technology_s' + i)
        let options = {
            loop: true,
            speed: 500,
            watchSlidesProgress: true,
            slideActiveClass: 'active',
            slideVisibleClass: 'visible',
            breakpoints: {
                0: {
                    spaceBetween: 15,
                    slidesPerView: 3
                },
                580: {
                    spaceBetween: 15,
                    slidesPerView: 3
                },
                768: {
                    spaceBetween: 15,
                    slidesPerView: 4
                },
                1023: {
                    spaceBetween: 20,
                    slidesPerView: 5
                },
                1300: {
                    spaceBetween: 30,
                    slidesPerView: 6
                }
            },
            pagination: {
                el: '.technology .swiper-pagination',
                type: 'bullets',
                clickable: true,
            }
        }
        technologySliders.push(new Swiper('.technology_s' + i, options))
    })
    const clientsSliders = [],
        clients = document.querySelectorAll('.clients .swiper')
    clients.forEach(function(el, i) {
        el.classList.add('clients_s' + i)
        let options = {
            loop: true,
            speed: 500,
            watchSlidesProgress: true,
            slideActiveClass: 'active',
            slideVisibleClass: 'visible',
            breakpoints: {
                0: {
                    spaceBetween: 15,
                    slidesPerView: 3
                },
                580: {
                    spaceBetween: 15,
                    slidesPerView: 3
                },
                768: {
                    spaceBetween: 15,
                    slidesPerView: 4
                },
                1023: {
                    spaceBetween: 20,
                    slidesPerView: 5
                },
                1300: {
                    spaceBetween: 30,
                    slidesPerView: 6
                }
            },
            pagination: {
                el: '.clients .swiper-pagination',
                type: 'bullets',
                clickable: true,
            }
        }
        clientsSliders.push(new Swiper('.clients_s' + i, options))
    })
    // Табы
    var locationHash = window.location.hash
    $('body').on('click', '.tabs button', function(e) {
        e.preventDefault()
        if (!$(this).hasClass('active')) {
            const $parent = $(this).closest('.tabs_container'),
                activeTab = $(this).data('content'),
                $activeTabContent = $(activeTab),
                level = $(this).data('level')
            $parent.find('.tabs:first button').removeClass('active')
            $parent.find('.tab_content.' + level).removeClass('active')
            $(this).addClass('active')
            $activeTabContent.addClass('active')
        }
    })
    if (locationHash && $('.tabs_container').length) {
        const $activeTab = $('.tabs button[data-content=' + locationHash + ']'),
            $activeTabContent = $(locationHash),
            $parent = $activeTab.closest('.tabs_container'),
            level = $activeTab.data('level')
        $parent.find('.tabs:first button').removeClass('active')
        $parent.find('.tab_content.' + level).removeClass('active')
        $activeTab.addClass('active')
        $activeTabContent.addClass('active')
        $('html, body').stop().animate({
            scrollTop: $activeTabContent.offset().top
        }, 1000)
    }
    window.addEventListener('resize', function() {
        WH = window.innerHeight || document.clientHeight || document.getElementsByTagName('body')[0].clientHeight
        let windowW = window.outerWidth
        if (typeof WW !== 'undefined' && WW != windowW) {
            // Перезапись ширины окна
            WW = window.innerWidth || document.clientWidth || document.getElementsByTagName('body')[0].clientWidth
            // Моб. версия
            if (!fakeResize) {
                fakeResize = true
                fakeResize2 = false
                document.getElementsByTagName('meta')['viewport'].content = 'width=device-width, initial-scale=1, maximum-scale=1'
            }
            if (!fakeResize2) {
                fakeResize2 = true
                if (windowW < 360) document.getElementsByTagName('meta')['viewport'].content = 'width=360, user-scalable=no'
            } else {
                fakeResize = false
                fakeResize2 = true
            }
        }
    })
})