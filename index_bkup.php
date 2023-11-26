

<?php get_header(); ?>

  <div class="p-inner">
    <section class="p-pickup">

      <?php
			$the_query = sub_loop(4);
			$counter = '';
			if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post();
					++$counter;
			?>
      <div class="p-pickup__content">
        <a href="">
          <figure class="p-pickup__image">
            <?php 
              if(has_post_thumbnail()):
                the_post_thumbnail();                   
              endif;
            ?>
          </figure>
          <div class="p-pickup__title__wrap">
            <p class="p-pickup__title">
              <?php the_title(); ?> 
            </p>
            <p class="p-pickup__info">2023/10/28 15views</p>
          </div>
        </a>
      </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>

    </section>

<section class="c-common__slider">

  <div class="c-common__slider__wrap slider1">

    <div class="c-common__slider__focus">
      <div class="c-common__slider__roll">
        <div class="c-common__slider__slide">
          <img src="" alt="イメージ">
          <p>タイトル1</p>
        </div>
        <div class="c-common__slider__slide">
          <img src="" alt="イメージ">
          <p>タイトル2</p>
        </div>
        <div class="c-common__slider__slide">
          <img src="" alt="イメージ">
          <p>タイトル3</p>
        </div>
        <div class="c-common__slider__slide">
          <img src="" alt="イメージ">
          <p>タイトル4</p>
        </div>
      </div>
    </div>
    <div class="p-indicator__wrap">
      <div class="nav">
      <div class="prev"><span class="triangle"></span></div>
      <div class="next"><span class="triangle"></span></div>
    </div>
    <div class="p-indicator"></div>
  </div>
</section>


    <main class="p-main">
      <div class="p-content">
        <div class="p-sort__block">
          <p class="p-sort__heading">最新の記事</p>
          <ul class="p-sort__list">
            <li class="p-sort__item"><a href="">人気順</a></li>
            <li class="p-sort__item"><a href="">新しい順</a></li>
            <li class="p-sort__item"><a href="">古い順</a></li>
          </ul>
        </div>

<div class="p-tab__categories">
  <div class="p-tab__categories__block">
    <a href="" class="p-tab__categories__block__inner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/journey.svg" alt="" class="p-tab__categories__block__image">
      <p class="p-tab__categories__block__title">JOURNEY</p>
    </a>
  </div>
  <div class="p-tab__categories__block">
    <a href="" class="p-tab__categories__block__inner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/food.svg" alt="" class="p-tab__categories__block__image">
      <p class="p-tab__categories__block__title">FOOD</p>
    </a>
  </div>
  <div class="p-tab__categories__block">
    <a href="" class="p-tab__categories__block__inner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/reccomend.svg" alt="" class="p-tab__categories__block__image">
      <p class="p-tab__categories__block__title">RECCOMEND</p>
    </a>
  </div>
  <div class="p-tab__categories__block">
    <a href="" class="p-tab__categories__block__inner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/motorcycle.svg" alt="" class="p-tab__categories__block__image">
      <p class="p-tab__categories__block__title">MOTORCYCLE</p>
    </a>
  </div>
</div>

        <section class="p-post__wrap">

        <?php
					$the_query = sub_loop(4,$paged);
					$counter = '';
					if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
					++$counter;
					?>
        <div class="p-post">
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
              <p class="p-pickup__info">2023/10/28 15views</p>
              </div>
            </a>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>


        </section>
      </div>
    <?php get_sidebar(); ?>

    </main>
  </div>
<?php get_footer(); ?>
