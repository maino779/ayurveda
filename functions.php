<?php
/**
 * CSSやJSを読み込む
 */
function my_enqueue_styles_and_scripts()
{
    // 共通CSSの読み込み
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/styles/style.css', [], null);

    // front-page のみ読み込む
    if (is_front_page() && !is_paged()) {
        wp_enqueue_style(
            'front-page',
            get_template_directory_uri() . '/assets/styles/front-page.css',
            ['style'],
            null
        );
    }

    // JavaScript の読み込み
    wp_enqueue_script(
        'main-script',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        null,
        true
    );

    // Splide.js の読み込み（CDN）
    wp_enqueue_script(
        'splide-js',
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js',
        [],
        '4.1.4',
        true
    );
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles_and_scripts');

// アイキャッチ画像有効化
add_theme_support('post-thumbnails');

/**
 * カスタム投稿タイプ「サービス実績」と
 * カスタムタクソノミー「サービスカテゴリー」を登録
 */
function register_custom_post_and_taxonomy() {
    // カスタム投稿タイプの登録
    register_post_type('service-post', [
        'label' => 'サービス実績',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'service'],
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);

    // カスタムタクソノミーの登録
    register_taxonomy('service_category', 'service-post', [
        'label' => 'サービスカテゴリー',
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'service-category'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_custom_post_and_taxonomy');


// 固定ページやカスタム投稿タイプも含める
function include_pages_in_search($query) {
    if ($query->is_search && !is_admin()) {
      $query->set('post_type', array('post', 'page')); // 固定ページも含める
    }
  }
  add_action('pre_get_posts', 'include_pages_in_search');
  