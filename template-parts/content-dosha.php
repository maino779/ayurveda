<div class="dosha-section section" id="dosha">

        <div class="section-title">
        <?php $page = get_page_by_path('dosha'); ?>
        <h2><?php echo $page->post_title; ?></h2>
        <div class="section-subtitle"><?php echo $page->post_content; ?></div>
        </div>


<div class="wrapper">
    <div class="dosha-text">人の個性は3つの要素が組み合わせて作られています
        <br>まずは自分の体質を知りましょう
    </div>

    <a href="<?php echo esc_url(home_url('/category/news/')); ?>"  class="btn">体質診断をやってみる</a>

    <div class="dosha-contents">
        <div class="dosha-wind dosha-contents-card">
            <div class="dosha-contents-title">ヴァータ</div>
            <div class="dosha-contents-subtitle">ー風の要素ー</div>
            <div class="dosha-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/image/wind.png" alt="ヴァータ"></div>
        </div>

        <div class="dosha-fire dosha-contents-card">
            <div class="dosha-contents-title">ピッタ</div>
            <div class="dosha-contents-subtitle">ー火の要素ー</div>
            <div class="dosha-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/image/fire.png" alt="ピッタ"></div>
        </div>

        <div class="dosha-water dosha-contents-card">
            <div class="dosha-contents-title">カファ</div>
            <div class="dosha-contents-subtitle">ー水の要素ー</div>
            <div class="dosha-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/image/water.png" alt="カファ"></div>
        </div>
    </div>
</div>



</div>

