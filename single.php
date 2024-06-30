<?php get_header(); ?>
<section class="post block">
    <div class="cont">
        <div class="text_block">
            <h1 class="title"><?php the_title(); ?></h1>
            <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
                  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                  $attachment_title = get_the_title($thumbnail_id);
            ?>
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "single"); ?>" alt="<?php echo $alt; ?>" title="<?php echo $attachment_title; ?>" loading="lazy">
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
<?php get_template_part( 'inc/projects', null, ['title' => get_field("title_projects", 2)]); ?>
<?php get_template_part( 'inc/form', null, ['title' => get_field("title_form", 2), 'desc'=>get_field("desc_form", 2)]); ?>
<?php get_footer(); ?>
