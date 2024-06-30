        </div>  
            <footer>
                <div class="cont">
                    <div class="footer_top">
                        <a href="<?php bloginfo('siteurl'); ?>" class="footer_logo">
                            <img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="">
                            <span>AppData</span>
                        </a>
                        <?php  wp_nav_menu ( array ( 'theme_location'  => 'footer-menu',  
                                'menu'            => '',   
                                'container'       => '',   
                                'container_class' => '',   
                                'container_id'    => '',  
                                'menu_class'      => 'footer_menu',   
                                'menu_id'         => '',  
                                'echo'            => true,  
                                'fallback_cb'     => 'wp_page_menu',  
                                'before'          => '',  
                                'after'           => '',  
                                'link_before'     => '',  
                                'link_after'      => '',  
                                'depth'           => 0,     
                                ) );  ?>    
                        <div class="footer_contact">
                            <a href="tel:<?php the_field("phone", "option"); ?>" class="footer_phone"><?php the_field("phone", "option"); ?></a>
                            <a href="<?php the_field("tg", "option"); ?>" class="footer_telegram" target="_blank" rel="noopener nofollow">
                                <img src="<?php bloginfo('template_url'); ?>/images/telegram.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="footer_bottom">
                        <div class="footer_copy">&copy; 2024 Все права защищены</div>
                        <a href="<?php the_permalink(3); ?>" class="footer_politic" target="_blank">Политика конфиденциальности</a>
                    </div>
                </div>
            </footer>

            <div class="overlay"></div>
        </div>

        <div class="supports_error">
            Ваш браузер устарел рекомендуем обновить его до последней версии<br> или использовать другой более современный.
        </div>

        <section class="modal" id="modal" style="display: none;">
            <div class="modal_title">Оставить заявку</div>
            <div class="modal_text">Пожалуйста, заполните форму, чтобы задать интересующий вас вопрос.</div>
            <form>
                <div class="line">
                    <div class="field">
                        <input type="text" placeholder="Имя" name="name" class="required">
                    </div>
                    <div class="field">
                        <input type="email" placeholder="E-mail" class="required" name="email">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Компания" name="company">
                    </div>
                </div>      
                <div class="line">
                    <div class="field">
                        <input type="tel" placeholder="Телефон" class="required" name="phone">
                    </div>
                    <div class="field">
                        <select name="what" id="select">
                            <option value="1">Что вас интересует?</option>
                            <option value="2">Что вас интересует?</option>
                            <option value="3">Что вас интересует?</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Должность" name="post">
                    </div>
                </div>
                <div class="line">
                    <div class="field">
                        <textarea placeholder="Комментарий" name="text"></textarea>
                    </div>
                </div>
                <div class="line">
                    <div class="form_text">Нажимая на кнопку вы соглашаетесь с нашим положениям о<br>конфиденциальности и политикой использования cookie-файлов</div>
                    <button type="submit" class="form_btn btn">
                        <span>отправить</span>
                    </button>
                </div>
                <input type="hidden" name="title" value="Заявка с сайта">
            </form> 
        </section>    

         <section class="modal" id="thanks" style="display: none;">
            <div class="modal_title">Спасибо!</div>
            <div class="modal_text">Скоро мы свяжемся с Вами!</div>
        </section>      

        <!-- Подключение javascript файлов -->
        <?php wp_footer(); ?>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery-3.5.0.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/swiper-bundle.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/fancybox.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/nice-select.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/imask.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>        

        <?php if(is_page(6)): ?>
        <script src="https://api-maps.yandex.ru/2.1.75/?load=package.standard,package.geoObjects&lang=ru-RU"></script>
        <script>
            $(window).on('load', () => {
                ymaps.ready(() => {
                    let myMap = new ymaps.Map('map', {
                        center: [55.7747400689659,37.60848150000002],
                        zoom: 16,
                        controls: []
                    })
                            
                    // Кастомный маркер
                    let myPlacemark = new ymaps.Placemark([55.7747400689659,37.60848150000002], {}, {
                        iconLayout : 'default#image',
                        iconImageHref : '<?php bloginfo('template_url'); ?>/images/marker.svg',
                        iconImageSize : [33, 47],
                    })
    
                    myMap.geoObjects.add(myPlacemark)
    
                    myMap.controls.add('zoomControl', {
                        position : {
                            right : '20px',
                            top   : '20px'
                        }
                    })
                    myMap.behaviors.disable('scrollZoom')
                })
            })
        </script>
        <?php endif; ?>
    </body>
</html>
