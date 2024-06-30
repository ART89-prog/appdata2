<?php
/*
Template Name: О нас
*/
?>
<?php get_header(); ?>
<section class="first-section block">
    <div class="first-section_img">
        <img src="<?php bloginfo('template_url'); ?>/images/first-section_img.png" alt="" loading="lazy">
    </div>
    <div class="cont">
        <div class="title">о нас</div>
        <div class="first-section_top">
            <div class="first-section_left">   
                <?php the_field("tekst_sleva"); ?>
            </div>
            <div class="first-section_right">
                <div class="first-section_items">
                    <?php if( have_rows('blok_s_cziframi') ): ?>
                    <?php while( have_rows('blok_s_cziframi') ): the_row(); 
                        $czifry = get_sub_field('czifry');
                        $opisanie = get_sub_field('opisanie');

                    ?>
                    <div class="first-section_item">
                        <div class="first-section_item-title"><?php echo $czifry; ?></div>
                        <div class="first-section_item-text"><?php echo $opisanie; ?></div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>                                                                    
                </div>
            </div>
        </div>
        <div class="first-section_bottom">
            <div class="first-section_column">
                <?php the_field("tekst_snizu_sleva"); ?>
            </div>
            <div class="first-section_column">
                <?php the_field("tekst_snizu_sprava"); ?>
            </div>
        </div>
    </div>
</section>


<section class="technology">
    <div class="cont">
        <div class="technology_title"><?php the_field("zagolovok2"); ?></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php 
                $images = get_field('logo');
                if( $images ): ?>
                <?php foreach( $images as $image ): ?>    
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($image); ?>" alt="" loading="lazy">
                </div>    
                <?php endforeach; ?>
                <?php endif; ?>                                                 
            </div>  
        </div>                  
        <div class="swiper-pagination"></div>   
    </div>
</section>


<section class="privileges">
    <div class="cont">
        <div class="title"><?php the_field("zagolovok3"); ?></div>
        <div class="privileges_items">
            <?php if( have_rows('pochemu') ): ?>
            <?php while( have_rows('pochemu') ): the_row(); 
                $ikonka = get_sub_field('ikonka');
                $zagolovok = get_sub_field('zagolovok');
                $opisanie = get_sub_field('opisanie');

            ?>
            <div class="privileges_item">
                <div class="privileges_item-icon">
                    <img src="<?php echo $ikonka; ?>" alt="" loading="lazy">
                </div>
                <div class="privileges_item-title"><?php echo $zagolovok; ?></div>
                <div class="privileges_item-text"><?php echo $opisanie; ?></div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>    
        </div>
    </div>
</section>




<section class="safety">
    <div class="safety_img">
        <img src="<?php bloginfo('template_url'); ?>/images/safety_img.png" alt="" loading="lazy">
    </div>
    <div class="cont">
        <div class="safety_info">
            <div class="safety_title"><?php the_field("zagolovok4"); ?></div>
            <div class="safety_text">
                <?php the_field("opisanie3"); ?>
            </div>
            <a href="#" class="safety_btn btn modal_link" data-content="#modal">
                <span>оставить заявку</span>
            </a>
        </div>
    </div>
</section>


<section class="clients">
    <div class="cont">
        <div class="title"><?php the_field("zagolovok5"); ?></div>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php 
                $images = get_field('klienty');
                if( $images ): ?>
                <?php foreach( $images as $image ): ?>    
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($image); ?>" alt="" loading="lazy">
                </div>    
                <?php endforeach; ?>
                <?php endif; ?>                                                       
            </div>  
        </div>                  
        <div class="swiper-pagination"></div>   
    </div>
</section>
<?php get_template_part( 'inc/projects', null, ['title' => get_field("title_projects", 2)]); ?>
<?php get_template_part( 'inc/form', null, ['title' => get_field("title_form", 2), 'desc'=>get_field("desc_form", 2)]); ?>
<?php get_footer(); ?>
