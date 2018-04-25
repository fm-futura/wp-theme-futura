<?php get_header(); ?>

<div class="container-fluid">

    <div id="content" class="clearfix row-fluid">

        <div id="main" class="span8 clearfix" role="main">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                        <header>

                            <div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>

                            <p class="meta"><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php the_category(' | '); ?></p>

                        </header> <!-- end article header -->

                        <section class="post_content clearfix" itemprop="articleBody">
                            <?php the_content(); ?>                           

                            <div class="slick-slider" data-slides="1" data-scroll="1">
                                <?php
                                $pod = pods('galeria', get_the_ID());
                                $galeria = $pod->field('imagenes');
                                foreach ($galeria as $imagen) {
                                    ?>
                                    <div class="slide">
                                        <a class="fancybox" rel="galery_<?php the_ID(); ?>" href="<?php echo $imagen[guid]; ?>" title="<?php echo $imagen[title]; ?>">
                                            <img src="<?php echo getTimThumbUrl($imagen[guid], 'custom', 1, 350, '') ?>" alt="<?php echo $imagen[title]; ?>">
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                            <?php wp_link_pages(); ?>

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
