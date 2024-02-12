<?php
$catid = get_query_var('cat');//現在のカテゴリーのIDを取得
$category = get_category($catid);//IDから現在のカテゴリーの情報を取得
$catname = $category->slug;//現在のカテゴリーのスラッグを取得
$page_data = get_page_by_path('bar/'.$catname );
//カテゴリースラッグと同じスラッグの固定ページの情報を取得
//親ページがある場合は親ページのスラッグを含める：今回の場合親ページが bar なので、bar を入力
$page_id = $page_data->ID;//取得した固定ページのIDを取得
$page = get_post($page_id, 'OBJECT' , 'raw');//ページIDから固定ぺーじのオブジェクトを取得
$page_include = apply_filters( 'the_content',$page->post_content);//ページの本文をフィルターフックで整形
?>

<?php get_header(); ?>
  <div class="p-inner">
    <main class="p-main">
      <div class="p-content">
        <?php
          $cat = get_the_category();
          $catname = $cat[0]->cat_name;
          $cat1 = 'JOURNEY';
          $cat2 = 'ITEMS';
          $cat3 = 'RECOMMEND';
          $cat4 = 'MOTORCYCLE';
        ?>
        <div class="c-common__heading__wrap">
          <h2 class="c-common__heading">"<?php echo $catname; ?>" の記事</h2>
          <?php 
            if ($catname == $cat1) {
              echo "<p class='c-common__heading__text'>> 旅の道程を克明に記録。<br><p class='c-common__heading__text'>> 備忘録を兼ねており、ためになる情報を発信。</p>";
            } 
            if ($catname == $cat2) {
              echo "<p class='c-common__heading__text'>> 飯。<br><p class='c-common__heading__text'>> 備忘録を兼ねており、ためになる情報を発信。</p>";
            } 
            if ($catname == $cat3) {
              echo "<p class='c-common__heading__text'>> おすすめ<br><p class='c-common__heading__text'>> 備忘録を兼ねており、ためになる情報を発信。</p>";
            } 
            if ($catname == $cat4) {
              echo "<p class='c-common__heading__text'>> バイク情報<br><p class='c-common__heading__text'>> 備忘録を兼ねており、ためになる情報を発信。</p>";
            } 
          ?>
        </div>
        <section class="p-post__wrap">
          <?php if(have_posts()): ?>
          <?php while(have_posts()):the_post(); ?>
          <div class="p-post">
            <p class="p-post__category">
              <a href="<?php echo get_category_link($cat->term_id); ?>">
                <?php echo $catname; ?>
              </a>
            </p>
            <a href="<?php the_permalink(); ?>">
              <figure class="p-post__image">
              <?php 
                if(has_post_thumbnail()):
                  the_post_thumbnail();                   
                endif;
              ?>
              </figure>
              <div class="p-pickup__title__wrap">
              <p class="p-post__title">
                <?php the_title(); ?> 
              </p>
              <p class="p-pickup__info"><?php the_date(); ?></p>
              </div>
            </a>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </section>
      </div>
      <?php get_sidebar(); ?>
    </main>
  </div>
<?php get_footer(); ?>