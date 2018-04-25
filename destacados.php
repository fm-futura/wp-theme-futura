<!-- Destacados -->
<?php
$my_query = query_destacados();
if ($my_query->have_posts()) {
    ?>
    <div id="destacados-wrapper">
        <div class="container-fluid">
            <div id="destacados" class="clearfix row-fluid">
                <header><h2>Destacados</h2></header>
                <?php
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    ?>
                    <article class="span6">
                        <div class="destacados_imagen" style="background-image: url(<?php echo getTimThumbUrl(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())), 'futura-featured-big','3') ?>)">
                            <a href="<?php the_permalink(); ?>">
                                <!--<img src="<?php //echo getTimThumbUrl(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())), 'futura-featured-big') ?>" alt="">-->
                            </a>
                        </div>
                        <div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>
                        </div>
                    </article>

                    <?php
                }
                ?>
            </div>
        </div><!-- #destacados-wrapper -->
    </div><!-- .container-fluid -->
<?php } ?>

