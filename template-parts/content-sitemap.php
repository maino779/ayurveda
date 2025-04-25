<div class="about-section section" id="about">

 
        <div class="section-title">
        <?php $page = get_page_by_path('sitemap'); ?>
        <h2><?php echo $page->post_title; ?></h2>
        </div>

      <!-- パンくず -->
      <?php if (function_exists('bcn_display')) {
      echo '<nav class="breadcrumb">';
      bcn_display();
      echo '</nav>';
       }?>


</div>

