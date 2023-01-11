<?php get_header(); ?>
<section class="category">
  <div class="container category__content"><button class="category-burger"> </button>
      <?php  
      // var_dump(get_query_var('post_type'));
      // var_dump($wp_query);
      // var_dump(get_post_type());
      wp_nav_menu([
          'theme_location'  => 'work',
          'container'       => false,
          'menu_class'      => 'category-menu',
          'link_before'     => '<span class="category-menu__link-text">',
	        'link_after'      => '</span>',
        ]);
        $imgAlt = get_the_title();
        ?>    
  </div>
</section>
  <section class="single">
    <div class="container single__grid">
      <div class="single__float">
        <div class="single__box">
          <p class="single__text">Проект был выполнен: <span class="single__text_bold"><?php the_field("date") ?></span></p>
          <p class="single__text">Над проектом работали: <span class="single__text_bold"><?php the_tags('', ' | '); ?></span></p>
          <p class="single__text">Заказ поступил от: <span class="single__text_bold"><?php the_field("client") ?></span></p>
        </div>
        <div class="single__tumbnail">
        <?php the_post_thumbnail('post-thumbnail', "alt=$imgAlt&class=single__img") ?> 
          <!-- <img class="single__img" src="./img/works/port2.jpg" alt=""> -->
        </div>
      </div>
      <div class="anonce">
        <h2 class="anonce__title"><span class="anonce__num">01</span><?php the_title() ?></h2>
      </div>
        <?php the_category(); ?>
        <?php the_terms( get_the_ID(), 'programming-taxonomy' , '&', '&', '' ); ?>
        <?php the_content() ?>
        <?php if(get_field("link") != ''): ?>
        <a class="single__btn btn" href="<?php the_field("link")?>">Посмотреть проект</a>
        <?php endif; ?>
    </div>
  </section>
  <?php get_footer(); ?>