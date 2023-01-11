<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <nav class="nav">
    <div class="container nav__content">
      <div class="logo">
        <?php the_custom_logo(); ?>
      </div>
      <button class="burger"> <span class="burger__line"></span></button>      
      <?php  wp_nav_menu([
            'theme_location'  => 'top',
            'container'       => false,
            'menu_class'      => 'menu',
          ]) ?>

    </div>
  </nav>