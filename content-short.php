<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix span6'); ?> role="article">
  <header>
    <h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    
  </header> <!-- end article header -->

  <section class="post_content clearfix">
		<?php the_excerpt(); ?>
  </section> <!-- end article section -->
</article> <!-- end article -->
