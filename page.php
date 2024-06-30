<?php get_header(); ?>
<section class="post block">
    <div class="cont">
        <div class="text_block">
            <h1 class="title"><?php the_title(); ?></h1>            
            <?php  if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
            <?php the_content(); ?>
            <?php endwhile; endif?> 
        </div>                                              
    </div>
    <div class="post_bg1">
        <img src="<?php bloginfo('template_url'); ?>/images/post_bg1.png" alt="" loading="lazy">
    </div>
    <div class="post_bg2">
        <img src="<?php bloginfo('template_url'); ?>/images/post_bg2.png" alt="" loading="lazy">
    </div>
</section>
<?php get_footer(); ?>
