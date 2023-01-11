<?php get_header(); ?>
  <header class="header"> 
    <div class="header__bg"> 
      <img src="<?php bloginfo("template_url");?>/assets/img/01.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/02.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/03.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/04.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/05.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/06.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/07.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/08.svg" alt="">
      <img src="<?php bloginfo("template_url");?>/assets/img/09.svg" alt="">      
    </div>
    <div class="container">
      <div class="header__box">
        <?php
        $query = new WP_Query('page_id=117');
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : 
            $query->the_post();
        ?>
        <div class="header__content">
          <h1 class="header__title"><?php the_field("title") ?><span class="header__title-span"><?php the_field("span_title") ?></span></h1>
          <div class="more__parent">
            <h3 class="header__subtitle"><a class="more" href="#"><?php the_field("subtitle") ?></a></h3>
            <div class="more__desc">
              <?php the_content() ?>
            </div>
          </div>
        </div>
        <?php the_post_thumbnail('post-thumbnail', "class=header__img") ?>        
        <?php 
          endwhile; 
        endif;
        wp_reset_postdata();
        ?>
       
      </div>
    </div>
  </header>
  <section class="about" id="about">
    <?php
    $query = new WP_Query('page_id=16');
    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : 
        $query->the_post();
    ?>
    <div class="anonce">
      <h2 class="anonce__title"><span class="anonce__num">01</span><?php the_title(); ?></h2>
      <h3 class="anonce__subtitle"><?php the_content(); ?></h3>
    </div>
    <?php 
      endwhile; 
    endif;
    wp_reset_postdata();
    ?>
    <div class="container about__content">
      <?php dynamic_sidebar("sidebar-about"); ?>
    </div>
  </section>
  <section class="works">
  <?php
    $query = new WP_Query('page_id=8');
    if ( $query->have_posts() ) :
      while ( $query->have_posts() ) : 
        $query->the_post();
    ?>
    <div class="anonce">
      <h2 class="anonce__title"><span class="anonce__num">02</span><?php the_title(); ?></h2>
      <h3 class="anonce__subtitle"><?php the_content(); ?></h3>
    </div>
    <?php 
      endwhile; 
    endif;
    wp_reset_postdata();
    ?>
    <div class="container">
    <?php 
      // параметры по умолчанию
      $posts = get_posts( array(
        'numberposts' => 3,
        'post_type' => array('programming'),
      ) );

      foreach( $posts as $post ):
        setup_postdata($post); 
        $imgAlt = get_the_title();
        ?>
      <div class="works__card">
        <div class="works__item"> 
          <a class="works__picture" href="<?php the_permalink() ?>">
            <div class="works__hover">
              <p>Кликни </p>
              <p>чтобы </p>
              <p>посмотреть</p>
            </div>
            <?php the_post_thumbnail('post-thumbnail', "alt=$imgAlt&class=works__img") ?> 
            <!-- <img class="works__img" src="img/works/port1.jpg" alt=""> -->
          </a>
        </div>
        <div class="works__item">
          <div class="works__content">
            <div class="works__rubrics">
            <?php the_terms( get_the_ID(), 'programming-taxonomy' , '@', '@', '' ); ?>
              <!-- <a class="works__link" href="">Брендинг</a> -->
            </div>
            <div class="more__parent">
              <h4 class="works__title"> 
                <a class="more" href="<?php the_permalink() ?>">
                <?php the_title() ?>
                </a>
              </h4>
              <div class="more__desc text-limit"><?php the_excerpt() ?></div>
            </div>
          </div>
        </div>
      </div>
      <? endforeach;
      wp_reset_postdata(); 
    ?>
    </div>
    <!-- <div class="works__btn"> -->
      <?php  wp_nav_menu([
          'theme_location'  => 'look',
          'container'       => false,
          'menu_class'      => 'works__btn',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>'
        ]) ?> 
      <!-- <a class="btn" href="">Смотреть больше</a> -->
    <!-- </div> -->
  </section>
  <?php get_footer(); ?>