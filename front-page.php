<?php get_header(); ?>

<main>
<div class="mainvisual">
    <div class="wrapper">
    <div class="mainvisual-title-contents ">
    <h1 >
        NO<br>
        AYURVEDA<br>
        NO <br>
        LIFE
    </h1>

    <h2>ー今日からととのうー<br>アーユルヴェーダで自分らしく、美しく</h2>
<?php get_search_form(); ?>
    </div>
</div>
</div>
<?php get_template_part('template-parts/content', 'news'); ?>
<?php get_template_part('template-parts/content', 'about'); ?>
<?php get_template_part('template-parts/content', 'dosha'); ?>
<?php get_template_part('template-parts/content', 'pickup'); ?>
<?php get_template_part('template-parts/content', 'popular'); ?>


</main>
<?php get_footer(); ?>