<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix span12'); ?> role="article">
    <header>
        <?php
        if (get_post_thumbnail_id(get_the_ID())) {
            ?>
            <a class="image_responsive img_link" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" style="background-image:url(<?php echo getTimThumbUrl(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())), 'futura-nota-home', '3') ?>)">
                <!--<img src="<?php //echo getTimThumbUrl(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())), 'futura-nota-home')   ?>" alt="">-->
            </a>
            <?php
        }
        ?>        
        <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>        
    </header> <!-- end article header -->

    <section class="post_content clearfix">
        <?php
        $pod = pods('post', $post->ID);
        if ($pod->field('audio_home')) {
            $urls = explode(',', $pod->field('audio_home'));
            echo do_shortcode('[reproductoraudio type="small" mp3="' . $urls[0] . '" ogg="' . $urls[1] . '"]');
        }
        ?>
        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
        <a href="<?php the_permalink(); ?>" class="more-link">Leer más...</a>
    </section> <!-- end article section -->
</article> <!-- end article -->

