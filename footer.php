<footer id ="footer">

<h3>サイトマップ</h3>
<ul class="sitemap-home-menu wrapper">
  <li><a href="/">ホーム</a></li>
  <li><a href="/category/diagnosis/">ドーシャ診断</a></li>
  <li><a href="/#about">アーユルヴェーダとは</a></li>
    <li class="menu-item menu-item-has-children">
  
      <ul class="footer-sub-menu">
        <?php
        $categories = get_categories([
          'orderby'    => 'id',       // ← ID順（古い順）
          'order'      => 'DESC',  // ← 降順（新しいID → 古いID）
          'orderby' => 'name',
          'hide_empty' => false // 記事がなくても表示
        ]);
        foreach ($categories as $category) {
          echo '<li><a href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . 'について</a></li>';
        }
        ?>
      </ul>
    </li>

    <li  class="menu-item menu-item-has-children">
    <ul class="footer-sub-menu">
    <?php
    $terms = get_terms([
      'taxonomy' => 'service_category', // ←ここをカスタムタクソノミー名に変更！
      'orderby' => 'name',
      'order' => 'ASC',
      'hide_empty' => false // 空のカテゴリーも表示
    ]);

    if (!is_wp_error($terms)) {
      foreach ($terms as $term) {
        echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
      }
    }
    ?>
  </ul>
    </li>
  
  </ul>

<ul class="sitemap-footer-menu">
<li><a href="/profile/">プロフィール</a></li>
<li><a href="/contact/">お問い合わせ</a></li>
<li><a href="/privacy-policy/">プライバシーポリシー</a></li> 
</ul>

<p class="copyright">&copy;<?php echo date('Y'); ?><span><?php echo bloginfo('name'); ?></span></p>
    
</footer>
<?php wp_footer(); ?>
</body>
</html>