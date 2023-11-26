        <aside class="p-sidebar">
        <nav class="p-sidebar__profile">
          <div class="p-sidebar__profile__bg">
          </div>
          <figure class="p-sidebar__profile__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/012.jpg" alt="プロフィール画像">
          </figure>
          <div class="p-sidebar__profile__info">
            <p class="p-sidebar__profile__name">加藤優介</p>
            <p class="p-sidebar__profile__job">住所不定無職</p>
            <p class="p-sidebar__profile__text">ラーメン食いたいラーメン食いたいラーメン食いたいラーメン食いたいラーメン食いたいラーメン食いたい</p>
          </div>
          <ul class="p-sidebar__profile__sns__list">
            <li class="sidebar__profile__sns__tem"><a href="">Twitter(X)</a></li>
            <li class="sidebar__profile__sns__tem"><a href="">Facebook</a></li>
            <li class="sidebar__profile__sns__tem"><a href="">Instagram</a></li>
            <li class="sidebar__profile__sns__tem"><a href="">Youtube</a></li>
          </ul>
        </nav>
        <nav class="p-sidebar__post__block">
          <p class="p-sidebar__heading">人気の記事</p>


<ul class="side_menu">
<?php
	setPostViews(get_the_ID());
	query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=10&order=DESC');
	while(have_posts()) : the_post();
?>

<li><a href="<?php the_permalink(); ?>"><?php
if(mb_strlen($post->post_title)>30):
	$title= mb_substr($post->post_title,0,30) ; echo $title. ･･･ ;
else:
	echo $post->post_title;
endif;
?></a></li>

<?php endwhile; ?>
<?php wp_reset_postdata(); wp_reset_query(); ?>
</ul>


<div class="p-sidebar__post">
  <a href="<?php the_permalink(); ?>">
    <figure class="p-sidebar__post__image">
  <?php 
    if(has_post_thumbnail()):
      the_post_thumbnail();                   
    endif;
  ?>
</figure>
    <p class="p-sidebar__post__title"><?php the_title(); ?> </p>
  </a>
</div>


        </nav>
        <nav class="p-sidebar__post__block">
          <p class="p-sidebar__heading">新着記事</p>

          <?php
          $the_query = sub_loop(4);
          $counter = '';
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
              ++$counter;
          ?>
          <div class="p-sidebar__post">
            <a href="<?php the_permalink(); ?>">
              <figure class="p-sidebar__post__image">
            <?php 
              if(has_post_thumbnail()):
                the_post_thumbnail();                   
              endif;
            ?>
          </figure>
              <p class="p-sidebar__post__title"><?php the_title(); ?> </p>
            </a>
          </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>

        </nav>
      </aside>