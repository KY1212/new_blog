<?php
/*
Template Name: contact
*/
?>
<?php get_header(); ?>

<body>

  <?php get_header(); ?>
  <div class="p-inner">
    <div class="p-contact">
      <?php
        echo do_shortcode('[contact-form-7 id="85df5f4" title="コンタクトフォーム 1"]');
      ?>
    </div>
  </div>
<?php get_footer(); ?>