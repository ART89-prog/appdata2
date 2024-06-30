<?php
/*
Template Name: Главная
*/
?>
<?php get_header(); ?>
<section class="about">
    <div class="cont">
        <div class="about_wrap">
            <div class="about_img">
                <img src="<?php the_field("foto"); ?>" alt="" loading="lazy">
            </div>
            <div class="about_info">
                <div class="about_title"><?php the_field("zagolovok2"); ?></div>
                <div class="about_text">
                    <?php the_field("opisanie2"); ?>
                </div>
                <a href="<?php the_permalink(50); ?>" class="about_btn btn">
                    <span>подробнее</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="explanation">
    <div class="cont">
        <div class="explanation_wrap">
            <div class="explanation_info">
                <div class="explanation_title"><?php the_field("zagolovok3"); ?></div>
                <div class="explanation_text"><?php the_field("opisanie3"); ?></div>
            </div>
            <div class="explanation_img">
                <img src="<?php the_field("foto2"); ?>" alt="" loading="lazy">
            </div>
        </div>
    </div>
</section>

<section class="advantages">
    <div class="cont">
        <div class="advantages_title"><?php the_field("zagolovok4"); ?></div>
        <div class="advantages_items">
            <?php if( have_rows('zvonite') ): ?>
            <?php while( have_rows('zvonite') ): the_row(); 
                $icon = get_sub_field('ikonka');
                $zagolovok = get_sub_field('zagolovok');
                $opisanie = get_sub_field('opisanie');

            ?>
            <div class="advantages_item">
                <div class="advantages_item-icon">
                    <img src="<?php echo $icon; ?>" alt="" loading="lazy">
                </div>
                <div class="advantages_item-title"><?php echo $zagolovok; ?></div>
                <div class="advantages_item-text"><?php echo $opisanie; ?></div>
                <a href="#" class="advantages_item-btn btn modal_link" data-content="#modal">
                    <span>Узнать больше</span>
                </a>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

            <div class="advantages_item">
                <div class="advantages_item-title">Бесплатная<br> Экскурсия</div>
                <div class="advantages_item-text">На онлайн-экскурсии<br>покажем Вам решение,<br>которые получите<br>в результате нашей работы</div>
                <a href="#" class="advantages_item-btn btn modal_link" data-content="#modal">
                    <span>Оставить заявку</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="benifits">
    <div class="cont">
        <div class="advantages_title"><?php the_field("zagolovok4"); ?></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php if( have_rows('zvonite') ): ?>
                <?php while( have_rows('zvonite') ): the_row(); 
                    $icon = get_sub_field('ikonka');
                    $zagolovok = get_sub_field('zagolovok');
                    $opisanie = get_sub_field('opisanie');

                ?>
                <div class="swiper-slide">
                    <div class="benifits_item">
                        <div class="benifits_item-icon">
                            <img src="<?php echo $icon; ?>" alt="" loading="lazy">
                        </div>
                        <div class="benifits_item-title"><?php echo $zagolovok; ?></div>
                        <div class="benifits_item-text"><?php echo $opisanie; ?></div>
                        <a href="#" class="benifits_item-btn btn modal_link" data-content="#modal">
                            <span>Узнать больше</span>
                        </a>
                    </div>
                </div>  
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="swiper-slide">
                    <div class="benifits_item lc">
                        <div class="benifits_item-title">Бесплатная<br> Экскурсия</div>
                        <div class="benifits_item-text">На онлайн-экскурсии<br>покажем Вам решение,<br>которые получите<br>в результате нашей работы</div>
                        <a href="#" class="benifits_item-btn btn modal_link" data-content="#modal">
                            <span>Оставить заявку</span>
                        </a>
                    </div>
                </div>                                                                  
            </div>  
        </div>                  
        <div class="swiper-pagination"></div>   
    </div>
</section>

<section class="projects">
    <div class="cont">
        <div class="projects_title">проекты</div>
        <div class="swiper">
            <div class="swiper-wrapper">

                <?php    
                 $args = array( 
                        'posts_per_page' => 20,     
                        'cat' => 1,
                        'orderby' =>'rand'                      
                    );   
                $query1 = new WP_Query($args);  while($query1->have_posts()) {
                $query1->the_post(); ?>
                <div class="swiper-slide">
                    <a href="<?php the_permalink(); ?>" class="projects_item">
                        <div class="projects_item-img">
                             <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                                      $attachment_title = get_the_title($thumbnail_id);
                                ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "project"); ?>" alt="<?php echo $alt; ?>" title="<?php echo $attachment_title; ?>" loading="lazy">
                        </div>
                        <div class="projects_item-info">
                            <div class="projects_item-title"><?php the_title(); ?></div>
                            <div class="projects_item-text"><?php the_field("desc"); ?></div>
                            <?php $parametr = get_field("parametr"); if($parametr): ?>
                            <ul class="projects_item-list">
                                <?php foreach ($parametr as $value): ?>                                
                                <li><?php echo $value["punkt"]; ?></li>
                                <?php endforeach ?>
                            </ul>  
                            <?php endif; ?> 
                        </div>  
                        <div class="projects_item-btn btn">
                            <span>Подробнее</span>
                        </div>                                  
                    </a>
                </div>
                <?php } wp_reset_postdata(); ?>

            </div>  
        </div>                  
        <div class="swiper-pagination"></div>   
        <div class="projects_btns">
            <a href="<?php echo get_category_link(1); ?>" class="projects_btn btn">
                <span>смотреть все</span>
            </a>    
        </div>      
    </div>
</section>

<section class="stage">
    <div class="cont">
        <div class="stage_title"><?php the_field("zagolovok5"); ?></div>
        <div class="stage_items">
            <?php if( have_rows('etapy') ): ?>
            <?php while( have_rows('etapy') ): the_row(); 
                $zagolovok = get_sub_field('zagolovok');
                $opisanie = get_sub_field('opisanie');
            ?>
            <div class="stage_item">
                <div class="stage_item-title"><?php echo $zagolovok; ?></div>
                <div class="stage_item-text"><?php echo $opisanie; ?></div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="stage_img">
        <img src="<?php bloginfo('template_url'); ?>/images/stage_img.png" alt="" loading="lazy">
    </div>
</section>


<?php get_template_part( 'inc/form', null, ['title' => get_field("title_form", 2), 'desc'=>get_field("desc_form", 2)]); ?>
<?php get_footer(); ?>
