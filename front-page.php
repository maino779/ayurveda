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

    <h2>アーユルヴェーダを知り尽くす</h2>
<?php get_search_form(); ?>
    </div>
</div>
</div>
<?php get_template_part('template-parts/content', 'about'); ?>
<?php get_template_part('template-parts/content', 'dosha'); ?>
<?php get_template_part('template-parts/content', 'pickup'); ?>
<?php get_template_part('template-parts/content', 'popular'); ?>
<?php get_template_part('template-parts/content', 'news'); ?>

</main>
<?php get_footer(); ?>