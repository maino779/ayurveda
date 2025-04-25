<div class="profile-section section" id="profile">
  <div class="section-title">
    <?php $page = get_page_by_path('profile'); ?>
    <h2><?php echo $page->post_title; ?></h2>
    <h3 class="section-subtitle">自己紹介</h3>
  </div>

  <div class="wrapper">
  <div class="profile-contents ">
   <div class="profile-image">
    <?php
     if (has_post_thumbnail()) {
        the_post_thumbnail('full');}?>
   </div>

   <div class="profile-text"><?php the_content(); ?></div>
    </div>

    </div>
  </div>
</div>
