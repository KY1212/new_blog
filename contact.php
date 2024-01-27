<?php
/*
Template Name: contact
*/
?>
<?php get_header(); ?>

<body>

  <?php get_header(); ?>
  <div class="p-inner p-inner__top">

    <div class="c-common__heading__wrap">
      <div class="c-common__heading__text__wrap">
        <p class='c-common__heading__text'>ご質問・ご依頼等々、お気軽にお問い合わせくださいませ。</p>
      </div>
    </div>

    <div class="p-contact">
      <?php
        echo do_shortcode('[contact-form-7 id="1182e05" title="コンタクトフォーム 1"]');
      ?>
    </div>
  </div>
<?php get_footer(); ?>