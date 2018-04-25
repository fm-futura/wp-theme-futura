<?php get_header(); ?>
<script>
    // Esto apesta pero tenemos un par de versiones de jQuery por los plugins y el template original.

    jQuery(document).ready(function () {

        jQuery('.crsl-items').carousel({autoRotate: 4000, visible: 2, itemMinWidth: 200, itemMargin: 13});

        jQuery('.crsl-items').on('initCarousel', function (event, defaults, obj) {
            jQuery('#galeria-nav').find('.previous, .next').css({opacity: 0});
            jQuery('.gallery-container').hover(function () {
                jQuery(this).find('.previous').css({left: 0}).stop(true, true).animate({left: '20px', opacity: 0.9});
                jQuery(this).find('.next').css({right: 0}).stop(true, true).animate({right: '20px', opacity: 0.9});
            }, function () {
                jQuery(this).find('.previous').animate({left: 0, opacity: 0});
                jQuery(this).find('.next').animate({right: 0, opacity: 0});
            });
        });

    }); // ready
</script>
<div class="container-fluid">

    <div id="content" class="clearfix row-fluid">

        <div id="main" class="span8 clearfix" role="main">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                        <header>

                            <div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>

                            <p class="meta"><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time></p>

                        </header> <!-- end article header -->

                        <section class="post_content clearfix" itemprop="articleBody">
                            <?php
                            $pod = pods('post', $post->ID);
                            if ($pod->field('audio_home')) {
                                $urls = explode(',', $pod->field('audio_home'));
                                echo do_shortcode('[reproductoraudio type="small" mp3="' . $urls[0] . '" ogg="' . $urls[1] . '"]');
                            }
                            ?>
                            <?php the_content(); ?>

                            <?php //wp_link_pages(); ?>

                        </section> <!-- end article section -->

                        <footer>

                            <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags", "bonestheme") . ':</span> ', ' ', '</p>'); ?>

                            <?php
                            // only show edit button if user has permission to edit posts
                            if ($user_level > 0) {
                                ?>
                                <a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post", "bonestheme"); ?></a>
                            <?php } ?>

                        </footer> <!-- end article footer -->

                    </article> <!-- end article -->
                    <?php //display_related_posts_via_taxonomies() ?>
                    <?php comments_template('', true); ?>

                <?php endwhile; ?>			

            <?php else : ?>

                <article id="post-not-found">
                    <header>
                        <h1><?php _e("Not Found", "bonestheme"); ?></h1>
                    </header>
                    <section class="post_content">
                        <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
                    </section>
                    <footer>
                    </footer>
                </article>

            <?php endif; ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); // sidebar 1 ?>

    </div> <!-- end #content -->

</div> <!-- .container -->

<?php get_footer(); ?>
