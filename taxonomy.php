<?php get_header(); ?>
<section class="category">
  <div class="container category__content"><button class="category-burger"> </button>
      <?php  wp_nav_menu([
          'theme_location'  => 'work',
          'container'       => false,
          'menu_class'      => 'category-menu',
          'link_before'     => '<span class="category-menu__link-text">',
	        'link_after'      => '</span>',
        ]) ?>
    <!-- <ul class="category-marks">
      <li><a class="category-marks__link active" href="">брендинг</a></li>
      <li><a class="category-marks__link" href="">опыт</a></li>
      <li><a class="category-marks__link" href="">дизайн</a></li>
      <li><a class="category-marks__link" href="">web</a></li>
    </ul> -->
  </div>
</section>
<section class="cards">
  <div class="anonce">
    <h2 class="anonce__title"><span class="anonce__num">01</span>РАБОТЫ</h2>
    <h3 class="anonce__subtitle"><?php single_cat_title(); //var_dump($wp_query) ?></h3>
  </div>
  <div class="container cards__grid">
  <?php 

    if(have_posts()) : while(have_posts()) : the_post(); 

    $imgAlt = get_the_title();
  ?>
    <div class="card"> 
      <a class="card__content" href="<?php the_permalink() ?>"> 
        <?php the_post_thumbnail('post-thumbnail', "alt=$imgAlt&class=card__img") ?> 
        <div class="card__desc"><?php the_excerpt() ?></div>
      </a>
      <div class="card__box">
        <div class="marks">        
          <?php the_terms( get_the_ID(), 'programming-taxonomy' , '', '', '' ); ?>
        </div>      
        <a class="card__title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
      </div>
    </div>      
  <?php 
    endwhile;
    wp_reset_postdata();
  endif;
  ?>   
    
  </div>
</section>
<section class="pagination container">
  <ul>
    <?php $links = paginate_links( [
      'base'    => user_trailingslashit( wp_normalize_path( get_permalink() .'/%_%/' ) ),
      'prev_text'    => __('Previous'),
      'next_text'    => __('Next'),
      'current' => max( 1, get_query_var( 'paged' ) ),
      'total'   => $query->max_num_pages,
    ] );
    $links = str_replace(
      array('<a ', '</a>'), 
      array('<li><a ', '</a></li>'), 
      $links);
    echo $links;
    ?>
  </ul>
</section>
<?php get_footer(); ?>