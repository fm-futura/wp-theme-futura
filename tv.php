<?php
// Videos

$my_query = query_videos();

if ($my_query->have_posts()) :
    $my_query->the_post();
    ?>
    <div id="tv-section" class="container-fluid">
        <div class="row-fluid"> <!-- vid -->
            <div id="tv-container" class="span8 tv-container">

                <h2 class="tv-title">TV Futura</h2>
                <div class="tv-video-container">
                    <?php
                    // Traer la url del video
                    $urls = array();
                    $p = get_post();
                    preg_match('@https?://(www.)?(youtube|vimeo)\.com/(watch\?v=)?([a-zA-Z0-9_-]+)@im', $p->post_content, $urls);
                    echo wp_oembed_get($urls[0]);
                    ?>
                    <div class="tv-video-descr">       
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php echo wp_trim_words(get_the_excerpt(), 40); ?>
                        <a href="<?php the_permalink(); ?>" class="more-link">Leer más...</a>
                    </div>
                </div>
            </div>
            <div id="tv-sidebar" class="span4 tv-sidebar">
                <h2 class="tv-title">Videos destacados</h2>
                <div class="tv-sidebar-container">
                    <div class="tv-sidebar-video-container">
                        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <div class="tv-sidebar-video">
                                    <a class="tv-sidebar-video-thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('futura-nota-home'); ?></a>
                                    <h3 class="tv-sidebar-video-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            <?php endwhile ?>
                        <?php endif ?>
                    </div>
                </div>

            </div>
        </div> <!-- vid -->
    </div>
    <?php





 endif ?>
