<?php
/*
Template Name: Услуги
*/
?>
<?php get_header(); ?>
<section class="service block">
    <div class="cont">
        <h1 class="service_title title"><?php the_title(); ?></h1>
        <div class="service_items">
            <?php if( have_rows('uslugi') ): ?>
            <?php while( have_rows('uslugi') ): the_row(); 
                $icon = get_sub_field('icon');
                $zagolovok = get_sub_field('zagolovok');
                $text = get_sub_field('text');

            ?>
            <div class="service_item">
                <div class="service_item-img">
                    <img src="<?php echo $icon; ?>" alt="" loading="lazy">
                </div>
                <div class="service_item-info">
                    <div class="service_item-title"><?php echo $zagolovok; ?></div>
                    <div class="service_item-text">
                        <?php echo $text; ?>
                    </div>
                    
                    <a href="#" class="service_item-btn btn modal_link" data-content="#modal">
                        <span>Оставить заявку</span>
                    </a>    
                </div>                              
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_template_part( 'inc/projects', null, ['title' => get_field("title_projects", 2)]); ?>
<?php get_template_part( 'inc/form', null, ['title' => get_field("title_form", 2), 'desc'=>get_field("desc_form", 2)]); ?>
<?php get_footer(); ?>
