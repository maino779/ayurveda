<?php get_header(); ?>


<section class="service-category-section section">
   
        
   <div class="section-title service-category-title">
       <h2><?php
            $category = get_queried_object();
            echo '<p class="category-slug">' . esc_html($category->slug) . '</p>';
            ?>
       </h2>
       <div class="section-subtitle"><?php single_cat_title(); ?></div>
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
      <ul class="category-posts ">
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
          <li class="post-card post-card-content">
          <a href="<?php the_permalink(); ?>">
          <div class="post-image">
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="WEB画像">
            <!-- カテゴリー背景色 -->
            <?php if (!empty($cat_slug)): ?>
                    <div class="post-category-name" style="background-color: <?php echo esc_attr($bg_color); ?>">
                      <?php echo esc_html($cat_slug); ?>
                    </div>
                  <?php endif; ?>
                  <!--  -->
            </div>
                <div class="post-date-title">
                <div class="post-date"><?php the_time('Y年n月j日'); ?></div>
                <h3 class="post-title"><?php the_title(); ?></h3>
                </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <p>現在、このカテゴリーに記事はありません。</p>
    <?php endif; ?>


</div>
</section>
<?php get_footer(); ?>
