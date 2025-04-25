<?php get_header(); ?>

<section class="single-section section search-section">
    
   <div class="section-title search-title">
       <h2>search</h2>
       <div class="section-subtitle">検索結果</div>
  </div>

   <!-- パンくず -->
   <div class="bread-line">
      <?php if (function_exists('bcn_display')) {
      echo '<nav class="breadcrumb">';
      bcn_display();
      echo '</nav>';
       }?>
    </div>

 <div class="search-contents ">
    <div class="wrapper">
<h3 class="search-contents-title">「<?php echo get_search_query(); ?>」に関連する記事一覧 
<span class="search-count">（<?php echo $wp_query->found_posts; ?>件）</span></h3>

<p class="search-lead">
  「<?php echo get_search_query(); ?>」に関連するコンテンツをお探しですか？
  当サイトでは、アーユルヴェーダの視点から「<?php echo get_search_query(); ?>」に役立つ情報をわかりやすく紹介しています。
</p>


<?php if (have_posts()) : ?>
  <ul class="search-results">
    <?php while (have_posts()) : the_post(); ?>
      <li class="search-list">
        <a href="<?php the_permalink(); ?>" class="arrow_s"><?php the_title(); ?></a>
      </li>
    <?php endwhile; ?>
  </ul>
<?php else : ?>
  <p>「<?php echo get_search_query(); ?>」に関する記事は見つかりませんでした</p>
<?php endif; ?>



<div class="search-pick-popular-contents">
<h3 class="search-subsection-title">こんな記事も読まれています</h3>

  <!-- おすすめ記事（カテゴリ 'pickup'） -->
  <div class="pickup-articles">
    <h4>おすすめの記事</h4>
    <ul class="pickup-list">
      <?php
      $pickup_posts = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'post',
        'orderby' => 'date',
  'order' => 'DESC',
  'meta_query' => [
    [
      'key'     => 'is_recommended',     // ← カスタムフィールド名
      'value'   => 'おすすめ',           // ← 入力値（完全一致 or LIKE）
      'compare' => 'LIKE'                // ← LIKE で曖昧一致（柔軟でおすすめ）
    ]
  ]
      ));
      if ($pickup_posts->have_posts()) :
        while ($pickup_posts->have_posts()) : $pickup_posts->the_post();
      ?>
          <li class="pickup-item">
            <a href="<?php the_permalink(); ?>" class="arrow_s"><?php the_title(); ?></a>
          </li>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </ul>
  </div>

  <!-- 人気記事（WP-PostViews使用） -->
  <div class="popular-articles">
    <h4>人気の記事</h4>
    <ul class="popular-list">
      <?php
      $popular_posts = new WP_Query(array(
        'posts_per_page' => 3,
        'meta_key'       => 'views',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'post_type'      => 'post'
      ));
      if ($popular_posts->have_posts()) :
        while ($popular_posts->have_posts()) : $popular_posts->the_post();
      ?>
          <li class="popular-item">
            <a href="<?php the_permalink(); ?>" class="arrow_s"><?php the_title(); ?></a>
          </li>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </ul>
  </div>
</div>



</div>
</div>
  </section>

<?php get_footer(); ?>
