<?php
define('DISALLOW_FILE_EDIT', true);
add_action('wp_enqueue_scripts', "stylesAndScripts");
add_action('after_setup_theme', "themeMenu");
add_action('widgets_init', "themeSidebar");
add_action( 'init', 'register_post_types' );


function stylesAndScripts()
{
  wp_enqueue_style("style", get_stylesheet_uri());
  wp_enqueue_style("default", get_template_directory_uri() . "/assets/css/style.min.css", [], '1.0.0');
  wp_deregister_script('jquery');
  wp_enqueue_script('my-common', get_template_directory_uri() . "/assets/js/common.js", [], "1.0.2", true);
}

function themeMenu()
{
  register_nav_menu('top', 'Меню в шапке');
  register_nav_menu('work', 'Меню работ');
  register_nav_menu('look', 'Кнопка "Смотреть больше"');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails', array( 'post', 'programming', 'page'));
}

function themeSidebar() {
  register_sidebar(array(
    'name'        => "Лозунги страницы 'О нас'", //то что выходит в админке WP
    'id'          => "sidebar-about", //идентификатор виджета
    'description'   => 'Сюда вставляй виджеты', //описание в админке
    'before_widget' => '', // основной тег в начале для виджета
    'after_widget'  => "", 

  ) );
  register_sidebar(array(
    'name'        => "Рубрики", //то что выходит в админке WP
    'id'          => "sidebar-categories", //идентификатор виджета
    'description'   => 'Сюда вставляй виджеты', //описание в админке
    'before_widget' => '', // основной тег в начале для виджета
    'after_widget'  => '', 
    // 'before_sidebar' => '<ul class="category-menu">', // WP 5.6
		// 'after_sidebar'  => '</ul>', // WP 5.6
  ) );
}

function register_post_types(){
register_taxonomy( 'programming-taxonomy', [ 'programming' ], [
  'label'                 => '', // определяется параметром $labels->name
  'labels'                => [
    'name'              => 'Технологии, языки, библиотеки ...',
    'singular_name'     => 'Технология, язык, библиотека ...',
    'search_items'      => 'Искать технологии, языки, библиотеки ...',
    'all_items'         => 'Все технологии, языки, библиотеки ...',
    'view_item '        => 'Вид технологии, языки, библиотеки ...',
    'parent_item'       => 'Родительская технология, язык, библиотека ...',
    'parent_item_colon' => 'Родительская технология, язык, библиотека ...:',
    'edit_item'         => 'Изменить технологию, язык, библиотеку ...',
    'update_item'       => 'Обновить технологию, язык, библиотеку ...',
    'add_new_item'      => 'Добавить технологию, язык, библиотеку ...',
    'new_item_name'     => 'Новое имя технологии, языка, библиотеки ...',
    'menu_name'         => 'Технологии, языки, библиотеки ...',
    'back_to_items'     => '← Обратно к технологии, языку, библиотеке ...',
  ],
  'description'           => 'Для работ по программированию могли использоваться технологии, языки, библиотеки ...', // описание таксономии
  'public'                => true,
  // 'publicly_queryable'    => null, // равен аргументу public
  // 'show_in_nav_menus'     => true, // равен аргументу public
  // 'show_ui'               => true, // равен аргументу public
  // 'show_in_menu'          => true, // равен аргументу show_ui
  // 'show_tagcloud'         => true, // равен аргументу show_ui
  // 'show_in_quick_edit'    => null, // равен аргументу show_ui
  'hierarchical'          => false,

  'rewrite'               => true,
  //'query_var'             => $taxonomy, // название параметра запроса
  'capabilities'          => array(),
  'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
  'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
  'show_in_rest'          => true, // добавить в REST API
  'rest_base'             => null, // $taxonomy
  // '_builtin'              => false,
  //'update_count_callback' => '_update_post_term_count',
] );
register_post_type( 'programming', [
  'label'  => null,
  'labels' => [
    'name'               => 'Программирование', // основное название для типа записи
    'singular_name'      => 'Программирование', // название для одной записи этого типа
    'add_new'            => 'Добавить работу по программированию', // для добавления новой записи
    'add_new_item'       => 'Добавление рыботы по программированию', // заголовка у вновь создаваемой записи в админ-панели.
    'edit_item'          => 'Редактирование рыботы по программированию', // для редактирования типа записи
    'new_item'           => 'Новое Программирование', // текст новой записи
    'view_item'          => 'Смотреть работу по программированию', // для просмотра записи этого типа.
    'search_items'       => 'Искать в работах по программированию', // для поиска по этим типам записи
    'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
    'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
    'parent_item_colon'  => '', // для родителей (у древовидных типов)
    'menu_name'          => 'Программирование', // название меню
  ],
  'description'         => '',
  'public'              => true,
  // 'publicly_queryable'  => null, // зависит от public
  // 'exclude_from_search' => null, // зависит от public
  // 'show_ui'             => null, // зависит от public
  // 'show_in_nav_menus'   => null, // зависит от public
  'show_in_menu'        => true, // показывать ли в меню адмнки
  // 'show_in_admin_bar'   => null, // зависит от show_in_menu
  'show_in_rest'        => null, // добавить в REST API. C WP 4.7
  'rest_base'           => null, // $post_type. C WP 4.7
  'menu_position'       => 4,
  'menu_icon'           => null,
  //'capability_type'   => 'post',
  //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
  //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
  'hierarchical'        => false,
  'supports'            => [ 'title', 'editor','thumbnail','excerpt'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
  'taxonomies'          => ["programming-taxonomy"],
  'has_archive'         => false,
  'rewrite'             => true,
  'query_var'           => true,
] );
register_taxonomy_for_object_type( 'post_tag', 'programming');
}

// Добавление классов тегу "a"
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth){
  if ($args->theme_location == "top") {
    $atts['class'] = "menu__link";
  } else if ($args->theme_location == "work") {
    $atts['class'] = "category-menu__link";
    if($atts['aria-current'] == 'page') {
      $atts['class'] .= " active";
    } 
    //var_dump($item->ID); // id тега li
    // var_dump(get_post_type()); // id записи
    else if(get_post_type() == 'programming' && $item->ID == 58){
      $atts['class'] .= " active";
    }
    else if(get_post_type() == 'post' && $item->ID == 57){
      $atts['class'] .= " active";
    }
  } else if ($args->theme_location == "look") {
    $atts['class'] = "btn";
  }
  return $atts;
}
// Изменение классов тега "li"
add_filter('nav_menu_css_class', 'change_menu_item_css_classes', 10, 4);
function change_menu_item_css_classes($classes, $item, $args, $depth){
  if ($args->theme_location == "top") {
    $classes = ['']; // изменение класса тега li
  }
  return $classes;
}

// замена в разделе записи слово «записи» на «дизайны»
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels( $labels ){
	$new = array(
		'name'                  => 'Дизайны',
		'singular_name'         => 'Дизайн',
		'add_new'               => 'Добавить дизайн',
		'add_new_item'          => 'Добавить дизайн',
		'edit_item'             => 'Редактировать дизайн',
		'new_item'              => 'Новый дизайн',
		'view_item'             => 'Просмотреть дизайн',
		'search_items'          => 'Поиск дизайна',
		'not_found'             => 'Дизайны не найдены.',
		'not_found_in_trash'    => 'Дизайна в корзине не найдено.',
		'parent_item_colon'     => '',
		'all_items'             => 'Все дизайны',
		'archives'              => 'Архивы дизайнов',
		'insert_into_item'      => 'Вставить в дизайн',
		'uploaded_to_this_item' => 'Загруженные для этого дизайна',
		'featured_image'        => 'Миниатюра дизайна',
		'filter_items_list'     => 'Фильтровать список дизайнов',
		'items_list_navigation' => 'Навигация по списку дизайнов',
		'items_list'            => 'Список дизайнов',
		'menu_name'             => 'Дизайны',
		'name_admin_bar'        => 'Дизайн', // пункте "добавить"
	);

	return (object) array_merge( (array) $labels, $new );
}


//Изменение вывода таксономии
add_filter( 'the_terms', 'wp_kama_the_terms_filter', 10, 5 );
function wp_kama_the_terms_filter( $term_list, $taxonomy, $before, $sep, $after ){
  
  if ($taxonomy == 'programming-taxonomy') {
    if ($before == '@') { // вывод таксономии на главной странице
      $term_list = str_replace('@<a ', '<a class="works__link" ', $term_list); 
    } 
    else if ($before == '&') { // вывод таксономии на странице проекта
      $term_list = '<ul class="category-marks">' . 
      str_replace(
        array('&<a ', '</a>'), 
        array('<li><a class="category-marks__link" ', '</a></li>'), 
      $term_list) . '</ul>'; 
    } 
    else {// вывод таксономии на странице "работы"    
      $term_list = str_replace('<a ', '<a class="marks__link" ', $term_list); 
    }
  }
	return $term_list;
}

//Изменение вывода категории
add_filter( 'the_category', 'wp_kama_the_category_filter', 10, 3 );

function wp_kama_the_category_filter( $thelist, $separator, $parents ){
  // var_dump($separator);
  if ($separator == '@') { // добавить класс ссылкам в файле page.php и category.php
    $thelist = str_replace(
      array('<a ', '</a>@'), 
      array('<a class="marks__link" ', '</a>'), 
      $thelist);
  } else {
    $thelist = str_replace(
        array('<ul class="post-categories">', '<a '), 
        array('<ul class="category-marks">', '<a class="category-marks__link" '), 
        $thelist);
  }
	return $thelist;
}

// Изменение длины отрывка
add_filter( 'excerpt_length', function(){
	return 25;
} );

// Заменить символ в конце отрывка
add_filter( 'excerpt_more', function( $more ) {
	return '...';
} );

