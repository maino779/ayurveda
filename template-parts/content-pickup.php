<div class="pickup-section section" id="pickup">

 
        <div class="section-title">
        <?php $page = get_page_by_path('pickup'); ?>
        <h2><?php echo $page->post_title; ?></h2>
        <h3 class="section-subtitle"><?php echo $page->post_content; ?></h3>
        </div>

  
<div class="wrapper">
  <div class="pickup-post-contents">
    <div class="pickup-post">
         <ul class="pickup-post-list post-card-list">
            <?php
            $args = [
              'post_type' => 'post', // ← ← ← 投稿タイプを指定！
                'posts_per_page' => 6, // ← 6件だけ取得
                'orderby' => 'date',   // ← 日付順に
               'meta_query' => [
  [
    'key' => 'is_recommended',
    'value' => 'おすすめ', // ← これに変更
   'compare' => 'LIKE'//配列の文字に 'おすすめ' が含まれていればヒット
  ]
]

            ];
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post(); 
                   


                     // カテゴリー情報の取得と背景色処理
                  $cat = get_the_category();
                  if ($cat) {
                      $cat_slug = $cat[0]->slug;
                      $cat_id = $cat[0]->term_id;
                      $bg_color = get_field('bg_color', 'category_' . $cat_id);
                      $bg_color = $bg_color ? $bg_color : '#4a806a'; // デフォルト色
                      $category_name = get_field('category', 'category_' . $cat_id); // ← ACFの「カテゴリー名」
                  }
                    ?>
               <li class="post-card post-card-content"><a href="<?php the_permalink(); ?>" >
                <div class="post-image">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="WEB画像">
                <!-- カテゴリー背景色 -->
                <?php if (!empty($cat_slug)): ?>
                    <div class="post-category-name" style="background-color: <?php echo esc_attr($bg_color); ?>">
                      <?php echo esc_html($category_name); ?>
                    </div>
                  <?php endif; ?>
                  <!--  -->
                </div>
                <div class="post-date-title">
                <div class="post-date"><?php the_time('Y年n月j日'); ?></div>
                <h3 class="post-title"><?php the_title(); ?></h3>
                </div>
            </a></li>
            
            <?php
                endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php
            endif;
            ?>
           
         </ul>
    </div>
    </div>
    <a href="<?php echo esc_url(home_url('/pickup/')); ?>" class="btn">もっとみる</a>
    </div>


</div>

