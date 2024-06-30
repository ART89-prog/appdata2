<section class="projects">
    <div class="cont">
        <div class="title">Другие проекты</div>
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
