<section class="contact" id="contact">
<?php
    $query = new WP_Query('page_id=19');
    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : 
        $query->the_post();
    ?>
    <div class="anonce">
      <h2 class="anonce__title"><span class="anonce__num">03</span><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
    <?php 
      endwhile; 
    endif;
    wp_reset_postdata();
    ?>
  </section>
  <footer class="footer">
    ©Проект создал и поддерживает Якубов Абдулла
  </footer>
  <?php wp_footer(); ?>
</body>

</html>