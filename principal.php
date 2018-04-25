<!-- Principal -->
<div class="container-fluid">
    <div id="content" class="clearfix row-fluid">

        <div id="main" class=" span8 clearfix" role="main">
            <header class="ultimas_notas"><h2>Últimas Notas</h2></header>            
            <?php
            $my_query = query_principal();
            if ($my_query->have_posts()) {
                ?>
                <!-- Primer Columna -->
                <div class="span12" id="columna1">
                    <?php
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        ?>
                        <div class="span6">
                            <div class="row-fluid">
                                <?php get_template_part('content', get_post_format()); ?>
                            </div>
                        </div>
                        <?php
                        if (($my_query->current_post % 2) != 0) {
                            ?>
                            <div class="clearfix"></div>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
                <?php /* Por ahora no --queremos-- anda paginacion  * / ?>
                  <div class="row-fluid">
                  <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
                  <?php page_navi(); // use the page navi function ?>
                  <?php } else { // if it is disabled, display regular wp prev & next links ?>
                  <nav class="wp-prev-next">
                  <ul class="clearfix">
                  <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
                  <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
                  </ul>
                  </nav>
                  <?php } ?>
                  </div>
                  <?php /* */ ?>

            <?php } else { ?>
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
            <?php } ?>

        </div> <!-- end #main -->

        <?php get_sidebar(); // sidebar 1          ?>

    </div> <!-- end #content -->
</div> <!-- end #container -->
