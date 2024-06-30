<?php get_header(); ?>
<section class="project block">
    <div class="cont">
        <h1 class="title"><?php single_cat_title(); ?></h1>

        <div class="tabs_container">
            <div class="tabs">                

                <button data-content="#tab1" data-level="level1" class="active">Все</button>
                  
                <?php $k=1; $categories = get_categories( [
                        'taxonomy'     => 'category',
                        'type'         => 'post',
                        'child_of'     => 0,
                        'parent'       => '1',
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                        'hide_empty'   => 0
                    ] );

                    if( $categories ){
                        foreach( $categories as $cati ){ $k++;?> 
                <button data-content="#tab<?php echo $k; ?>" data-level="level1"><?php echo $cati->name; ?></button>
                <?php } } ?>
            </div>

          
            <div class="tab_content level1 active" id="tab1">
                <div class="project_items">
                    <?php    
                     $args = array( 
                            'posts_per_page' => -1,    
                            'cat'            => 1                    
                        );   
                    $query1 = new WP_Query($args);  while($query1->have_posts()) {
                    $query1->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="project_item">
                        <div class="project_item-img">
                            <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                                  $attachment_title = get_the_title($thumbnail_id);
                            ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "project"); ?>" alt="<?php echo $alt; ?>" title="<?php echo $attachment_title; ?>" loading="lazy">
                        </div>
                        <div class="project_item-info">
                            <div class="project_item-title"><?php the_title(); ?></div>
                            <div class="project_item-text"><?php the_field("desc"); ?></div>
                            <div class="project_item-btn btn">
                                <span>Подробнее</span>
                            </div>  
                        </div>                                                                      
                    </a>    
                    <?php } wp_reset_postdata(); ?>
                </div>                              
            </div>

            <?php $k=1; if( $categories ){
                        foreach( $categories as $cati ){ $k++;?> 
            <div class="tab_content level1" id="tab<?php echo $k; ?>">
                <div class="project_items">
                    <?php    
                     $args = array( 
                            'posts_per_page' => -1,    
                            'cat'            => $cati->term_id                         
                        );   
                    $query1 = new WP_Query($args);  while($query1->have_posts()) {
                    $query1->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="project_item">
                        <div class="project_item-img">
                            <?php $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                                  $attachment_title = get_the_title($thumbnail_id);
                            ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "project"); ?>" alt="<?php echo $alt; ?>" title="<?php echo $attachment_title; ?>" loading="lazy">
                        </div>
                        <div class="project_item-info">
                            <div class="project_item-title"><?php the_title(); ?></div>
                            <div class="project_item-text"><?php the_field("desc"); ?></div>
                            <div class="project_item-btn btn">
                                <span>Подробнее</span>
                            </div>  
                        </div>                                                                      
                    </a>    
                    <?php } wp_reset_postdata(); ?>
                </div>                              
            </div>
            <?php } } ?>

        </div>        
    </div>
</section>
<?php get_template_part( 'inc/form', null, ['title' => get_field("title_form", 2), 'desc'=>get_field("desc_form", 2)]); ?>
<?php get_footer(); ?>
