<form class="search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
  <input type="search" class="search-field" name="s" placeholder="検索窓" value="<?php echo get_search_query(); ?>">
  <button type="submit" class="search-submit" aria-label="検索">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image/search.png" alt="検索ボタン">
  </button>
</form>
