<?php get_header(); ?>


  <section class="single-section section">
   
    
  <div class="section-title service-category-title">
       <h2> <?php
$terms = get_the_terms(get_the_ID(), 'service_category');
if ($terms && !is_wp_error($terms)) {
  $term = $terms[0];
  echo '<h2 class="category-slug">' . esc_html($term->slug) . '</h2>';
 
}
?>
       </h2>
       <div class="section-subtitle"> 
  <?php
$terms = get_the_terms(get_the_ID(), 'service_category');
if ($terms && !is_wp_error($terms)) {
  $term = $terms[0];
  echo '<div class="section-subtitle">' . esc_html($term->name) . '</div>';
}
?>
</div>
   </div>
 

    
      <!-- パンくず -->
    <div class="bread-line">
      <?php if (function_exists('bcn_display')) {
      echo '<nav class="breadcrumb">';
      bcn_display();
      echo '</nav>';
       }?>
    </div>
    
<div class="wrapper">
    <?php if (have_posts()) : ?>
      <div class="single-post">
        <?php while (have_posts()) : the_post(); 
        // カテゴリー情報の取得と背景色処理
        $cat = get_the_category();
        if ($cat) {
            $cat_slug = $cat[0]->slug;
            $cat_id = $cat[0]->term_id;
            $bg_color = get_field('bg_color', 'category_' . $cat_id);
            $bg_color = $bg_color ? $bg_color : '#4a806a'; // デフォルト色
        }
        ?>
          <div class="single-post-contents">
          <h2 class="single-post-title"><?php the_title(); ?></h2>
          <div class="single-post-image">
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="WEB画像">
            </div>

                <div class="single-date-title">
                <div class="single-date"><?php the_time('Y年n月j日'); ?></div>
                <div class="single-text"><?php the_content(); ?></div>
                
<!-- 🔸 いいねボタン（WP ULike） -->
 <div class="sns-btn">
    <p>この記事を「いいね」と思った方は、左下のグッドボタンを押していただけるとうれしいです！</p>
<?php if (function_exists('wp_ulike')) wp_ulike('get'); ?>
</div>

<!-- 🔸 SNSフォローボタン（プロフィールリンク） -->
<div class="follow-icons">
  <p>記事更新や日々の気づきを発信中。  
  よかったらフォローしてください♡</p>
  <a href=" https://x.com/YuYuki1111mm?t=BvK2q0h2tBeMxjHnFNu6uQ&s=06" target="_blank" class="follow-btn twitter"><i class="fab fa-x-twitter"></i></a>
  <a href="https://note.com/yup636/n/ndf0fb1482418" target="_blank" class="follow-btn note">
  <i class="fas fa-sticky-note"></i>
</a>

</div>


                </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <p>現在、このカテゴリーに記事はありません。</p>
    <?php endif; ?>


    <!-- おすすめ・人気記事 -->
  
<div class="search-pick-popular-contents ">
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
  </section>



<?php get_footer(); ?>
