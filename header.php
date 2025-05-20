<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('name'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body>
    <header id="header">
    <div class="header-inner">
      <div class="site-title"><a href="<?php echo esc_url(home_url()); ?>">
        <?php echo bloginfo('name'); ?></a></div>

        <nav class="navi scroll-nav">
  <ul class="navi-menu">
  
    <li><a href="/#about" class="menu-title">アーユルヴェーダとは</a></li>
    <li><a href="/#dosha" class="menu-title">ドーシャ診断</a></li>
    <li class="menu-item  menu-item-has-children">
      <a href="/#blog" class="menu-title menu-title-blog">ブログ<span class="menu-arrow">></span></a>
      <ul class="sub-menu">
        <?php
        $categories = get_categories([
      
          'order'      => 'ASC',  // ← 降順（新しいID → 古いID）
      
          'hide_empty' => false // 記事がなくても表示
        ]);
        foreach ($categories as $category) {
          echo '<li><a href="' . get_category_link($category->term_id) . '"><span class="sub-menu-left">></span>   ' . esc_html($category->name) . '</a></li>';
        }
        ?>
      </ul>
    </li>

    <li  class="menu-item menu-item-has-children"><a href="/#service" class="menu-title menu-title-service">サービス案内 <span class="menu-arrow">></span></a>
    <ul class="sub-menu">
    <?php
    $terms = get_terms([
      'taxonomy' => 'service_category', // ←ここをカスタムタクソノミー名に変更！
      'orderby' => 'name',
      'order' => 'ASC',
      'hide_empty' => false // 空のカテゴリーも表示
    ]);

    if (!is_wp_error($terms)) {
      foreach ($terms as $term) {
        echo '<li><a href="' . esc_url(get_term_link($term)) . '"><span class="sub-menu-left">></span>  ' . esc_html($term->name) . '</a></li>';
      }
    }
    ?>
  </ul>
    </li>
  
  </ul>
</nav>


      </div>

      <div class="humberger">
        <span></span>
        <span></span>
        <span></span>
      </div>
     
      <div class="overlay"></div>

    </header>

   
