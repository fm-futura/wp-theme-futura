<div id="fotogaleria" class="container-fluid gallery-container">
    <h2 class="title">Fotogalería</h2>
    <?php
    // Gallery    
    $my_query = query_galeria();

    if ($my_query->have_posts()) :
        ?>
        <div class="slick-slider" data-slides="4" data-scroll="1">
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>                    
                <div class="slide front-page">
                    <img src="<?php echo getTimThumbUrl(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())), 'custom', 225, 162) ?>" >
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                </div>
            <?php endwhile ?>
        </div>
    <?php endif ?>
</div>
