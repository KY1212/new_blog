

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
            <p class="p-pickup__info">投稿日：<?php the_date(); ?> 15views</p>
          </div>
        </a>
      </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>

    </section>




    <main class="p-main">
      <div class="p-content">
        <!-- <div class="p-sort__block">
          <p class="p-sort__heading">最新の記事</p>
          <ul class="p-sort__list">
            <li class="p-sort__item"><a href="">人気順</a></li>
            <li class="p-sort__item"><a href="">新しい順</a></li>
            <li class="p-sort__item"><a href="">古い順</a></li>
          </ul>
        </div> -->

      <div class="p-tab__categories">
        <div class="p-tab__categories__block is-tab__title is-tab__active">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/journey.svg" alt="" class="p-tab__categories__block__image">
            <p class="p-tab__categories__block__title">JOURNEY</p>
        </div>
        <div class="p-tab__categories__block is-tab__title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/food.svg" alt="" class="p-tab__categories__block__image">
            <p class="p-tab__categories__block__title">FOOD</p>
        </div>
        <div class="p-tab__categories__block is-tab__title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/reccomend.svg" alt="" class="p-tab__categories__block__image">
            <p class="p-tab__categories__block__title">RECCOMEND</p>
        </div>
        <div class="p-tab__categories__block is-tab__title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/motorcycle.svg" alt="" class="p-tab__categories__block__image">
            <p class="p-tab__categories__block__title">MOTORCYCLE</p>
        </div>
      </div>

      <?php
        $cat = get_the_category();
        $catname = $cat[0]->cat_name;
        $cat1 = 'JOURNEY';
        $cat2 = 'FOOD';
        $cat3 = 'RECOMMEND';
        $cat4 = 'MOTORCYCLE';
      ?>
      <div class="is-tab is-show">
        <section class="p-post__wrap">
          <?php
            $newslist = get_posts( array(
              'category_name' => 'journey',// 全件表示用はスラッグを空欄 
              'posts_per_page' => 10 
            ));
            foreach( $newslist as $post ):
            setup_postdata( $post );
          ?>
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
          <?php endforeach; wp_reset_postdata();?>
          <div class="pagination">
            <div class="list-box">
              <ul>
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query( array(
                  'post_status' => 'publish',
                  'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                  'category_name' => 'journey',// 全件表示用はスラッグを空欄 
                  'paged' => $paged,
                  'posts_per_page' => 10, // 表示件数
                  'orderby'     => 'date',
                  'order' => 'DESC'
                ) );
                if ($the_query->have_posts()) :
                  while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                <?php
                  endwhile;
                  else:
                  echo '<div><p>準備中です。</p></div>';
                  endif;
                ?>
              </ul>
            </div>

            <div class="pnavi">
                <?php //ページリスト表示処理
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged','%#%');
                }else{
                    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/','paged');
                    $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $the_query->max_num_pages,
                    'mid_size' => 1,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => '< 前へ',
                    'next_text' => '次へ >',
                ));
                ?>
            </div>
          </div>
        </section>
      </div>
      <div class="is-tab ">
        <section class="p-post__wrap">
          <?php
            $newslist = get_posts( array(
              'category_name' => 'food',// 全件表示用はスラッグを空欄 
              'posts_per_page' => 10 
            ));
            foreach( $newslist as $post ):
            setup_postdata( $post );
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
              <p class="p-pickup__info"><?php the_date(); ?></p>
              </div>
            </a>
          </div>
          <?php endforeach; wp_reset_postdata();?>
          <div class="pagination">
            <div class="list-box">
                <ul>
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query( array(
                    'post_status' => 'publish',
                    'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                        'category_name' => 'food',// 全件表示用はスラッグを空欄 

                    'paged' => $paged,
                    'posts_per_page' => 10, // 表示件数
                    'orderby'     => 'date',
                    'order' => 'DESC'
                ) );
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                        <?php
                        /*　ここにループさせるコンテンツを入れます　*/
                        ?>
                    <?php
                    endwhile;
                else:
                    echo '<div><p>準備中です。</p></div>';
                endif;
                ?>
                </ul>
            </div>

            <div class="pnavi">
                <?php //ページリスト表示処理
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged','%#%');
                }else{
                    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/','paged');
                    $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $the_query->max_num_pages,
                    'mid_size' => 1,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => '< 前へ',
                    'next_text' => '次へ >',
                ));
                ?>
            </div>
          </div>
        </section>
      </div>
      <div class="is-tab ">
        <section class="p-post__wrap">
          <?php
            $newslist = get_posts( array(
              'category_name' => 'reccomend',// 全件表示用はスラッグを空欄 
              'posts_per_page' => 10 
            ));
            foreach( $newslist as $post ):
            setup_postdata( $post );
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
              <p class="p-pickup__info"><?php the_date(); ?></p>
              </div>
            </a>
          </div>
          <?php endforeach; wp_reset_postdata();?>
          <div class="pagination">
            <div class="list-box">
                <ul>
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query( array(
                    'post_status' => 'publish',
                    'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                        'category_name' => 'recommend',// 全件表示用はスラッグを空欄 

                    'paged' => $paged,
                    'posts_per_page' => 10, // 表示件数
                    'orderby'     => 'date',
                    'order' => 'DESC'
                ) );
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                        <?php
                        /*　ここにループさせるコンテンツを入れます　*/
                        ?>
                    <?php
                    endwhile;
                else:
                    echo '<div><p>準備中です。</p></div>';
                endif;
                ?>
                </ul>
            </div>

            <div class="pnavi">
                <?php //ページリスト表示処理
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged','%#%');
                }else{
                    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/','paged');
                    $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $the_query->max_num_pages,
                    'mid_size' => 1,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => '< 前へ',
                    'next_text' => '次へ >',
                ));
                ?>
            </div>
          </div>
        </section>
      </div>
      <div class="is-tab ">
        <section class="p-post__wrap">
          <?php
            $newslist = get_posts( array(
              'category_name' => 'motorcycle',// 全件表示用はスラッグを空欄 
              'posts_per_page' => 10
            ));
            foreach( $newslist as $post ):
            setup_postdata( $post );
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
              <p class="p-pickup__info"><?php the_date(); ?></p>
              </div>
            </a>
          </div>
          <?php endforeach; wp_reset_postdata();?>
          <div class="pagination">
            <div class="list-box">
                <ul>
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query( array(
                    'post_status' => 'publish',
                    'post_type' => 'post', //　ページの種類（例、page、post、カスタム投稿タイプ名）
                        'category_name' => 'motorcycle',// 全件表示用はスラッグを空欄 

                    'paged' => $paged,
                    'posts_per_page' => 10, // 表示件数
                    'orderby'     => 'date',
                    'order' => 'DESC'
                ) );
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                    ?>
                        <?php
                        /*　ここにループさせるコンテンツを入れます　*/
                        ?>
                    <?php
                    endwhile;
                else:
                    echo '<div><p>準備中です。です。</p></div>';
                endif;
                ?>
                </ul>
            </div>

            <div class="pnavi">
                <?php //ページリスト表示処理
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged','%#%');
                }else{
                    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/','paged');
                    $paginate_base .= '%_%';
                }
                echo paginate_links(array(
                    'base' => $paginate_base,
                    'format' => $paginate_format,
                    'total' => $the_query->max_num_pages,
                    'mid_size' => 1,
                    'current' => ($paged ? $paged : 1),
                    'prev_text' => '< 前へ',
                    'next_text' => '次へ >',
                ));
                ?>
            </div>
          </div>
        </section>
      </div>


      </div>
    <?php get_sidebar(); ?>

    </main>
  </div>
<?php get_footer(); ?>
