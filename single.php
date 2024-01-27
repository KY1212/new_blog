<?php
/*
single
*/
?>
<?php
// 記事のビュー数を更新(ログイン中・ロボットによる閲覧時は除く)
    if (!is_user_logged_in() && !is_robots()) {
        setPostViews(get_the_ID());
    }
?>
<?php get_header(); ?>
  <div class="p-inner">
    <main class="p-main">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <section class="p-single">
          <h2 class="p-single__title">
            記事のタイトルが入ります。記事のタイトルが入ります。
          </h2>
          <div class="p-single__info__wrap">

            <p class="p-pickup__info"><?php the_time('Y.m.d'); ?> 15views</p>
          </div>
          <figure class="p-single__image">
            <?php 
              if(has_post_thumbnail()):
                the_post_thumbnail();                   
              endif;
            ?>
          </figure>
          <div class="p-post__text__area">
            <?php the_content(); ?>
          </div>

            <div class="c-sns">
              <div class="c-sns__item">
                <a href="https://twitter.com/home?lang=ja">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/x-black.svg" alt="X" class="c-sns__icon">
                </a>
              </div>
              <div class="c-sns__item">
                <a href="https://twitter.com/home?lang=ja">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.svg" alt="Instagram" class="c-sns__icon">
                </a>
              </div>
              <div class="c-sns__item">
                <a href="https://twitter.com/home?lang=ja">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/reddit.svg" alt="Reddit" class="c-sns__icon">
                </a>
              </div>
            </div>


          <div class="p-post__pagination">
              <?php $nextpost = get_adjacent_post(false, '', false); if ($nextpost) : ?>
              <div class="p-post__pagination__left">
                <span class="p-post__pagination__heading">PREV</span>
                  <a href="<?php echo get_permalink($nextpost->ID); ?>">
                      <span class="p-post__pagination__left__img"><?php echo get_the_post_thumbnail($nextpost->ID); ?></span>
                      <span class="p-post__pagination__left__text"><?php echo esc_attr($nextpost->post_title); ?></span>
                  </a>
              </div>
              <?php endif; ?>
              <?php $prevpost = get_adjacent_post(false, '', true); if ($prevpost) : ?>
              <div class="p-post__pagination__right">
                <span class="p-post__pagination__heading">NEXT</span>
                  <a href="<?php echo get_permalink($prevpost->ID); ?>">
                      <span class="p-post__pagination__right__img"><?php echo get_the_post_thumbnail($prevpost->ID); ?></span>
                      <span class="p-post__pagination__right__text"><?php echo esc_attr($prevpost->post_title); ?></span>
                  </a>
              </div>
              <?php endif; ?>
          </div>
          <div>
            <!-- <form action="">
              <label for="name">お名前</label>
              <input type="text" id="name" name="name">
              <label for="comment">コメント</label>
              <textarea name="comment" id="comment" cols="150" rows="10">コメントを記述してください</textarea>
            </form> -->
<?php comments_template(); ?>
          </div>
        </section>
            <?php endwhile; endif; ?>
<?php get_sidebar(); ?>
    </main>
  </div>


<?php get_footer(); ?>