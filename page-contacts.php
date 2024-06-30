<?php
/*
Template Name: Контакты
*/
?>
<?php get_header(); ?>
<section class="contacts block">
    <div class="cont">
        <div class="contacts_wrap">
            <div class="contacts_info">
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="contacts_items">
                    <div class="contacts_item">
                        <span>Адрес:</span>
                        <div><?php the_field("adres", "option"); ?></div>
                    </div>
                    <div class="contacts_item">
                        <span>Телефон:</span>
                        <a href="tel:<?php the_field("phone", "option"); ?>"><?php the_field("phone", "option"); ?></a>
                    </div>
                    <div class="contacts_item">
                        <span>Почта:</span>
                        <a href="mailto:<?php the_field("email", "option"); ?>"><?php the_field("email", "option"); ?></a>
                    </div>
                    <div class="contacts_item">
                        <span>Telegram:</span>
                        <a href="<?php the_field("tg", "option"); ?>" target="_blank" rel="noopener nofollow"><?php the_field("tg", "option"); ?></a>
                    </div>
                </div>
            </div>
            <div class="map_wrap">
                <div id="map"></div>                                
            </div> 
        </div>
    </div>
</section>

<section class="callbaks">
    <div class="cont">
        <div class="title">Оставить заявку</div>
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
    </div>                  
</section>
<?php get_footer(); ?>
