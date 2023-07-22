<?php get_header();?>
    <main class="page">
      <div data-observ></div>
     
      <?php if( have_rows('first_section') ): ?>
        <?php while( have_rows('first_section') ): the_row(); 
        $images = get_sub_field('images');
        ?>
          <section class="page__promo promo">
            <div class="promo__container">
              <div class="promo__content">
                <h1 class="title promo__title"><?php the_sub_field('title')?></h1>
                <?php if( have_rows('list') ): ?>
                  <ul class="promo__list">
                  <?php while( have_rows('list') ): the_row(); ?>
                    <li class="promo__item">
                      <span class="icon-check promo__item-icon">
                        <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M25.1666 1.75L9.12492 17.7917L1.83325 10.5" stroke="#141414" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </span>
                      <span class="promo__item-text"><?php the_sub_field('list_item')?></span>
                    </li>
                  <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
                <button class="button promo__button" type="button" data-type="offerPopup">
                  <?php the_sub_field('button_text')?>
                </button>
              </div>
              <div class="promo__image-ibg">
                <?php echo wp_get_attachment_image( $images, 'full' ); ?>
              </div>
            </div>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if( have_rows('second_section') ): ?>
        <?php while( have_rows('second_section') ): the_row(); ?>
        <section class="desc page__desc">
          <div class="desc__container">
            <p class="desc__text">
              <?php the_sub_field('text')?>
            </p>
            <?php if( have_rows('desc__media') ): ?>
            <div class="swiper desc__media slider-desc" data-mobile="false">
              <div class="swiper-wrapper slider-desc__wrapper">
              <?php while( have_rows('desc__media') ): the_row(); 
                $image = get_sub_field('image');
              ?>
              <div class="swiper-slide slider-desc__image-ibg">
                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
              </div>
              <?php endwhile; ?>
              </div>
              <div class="swiper-pagination slider-desc__progress-bar"></div>
            </div>
            <?php endif; ?>
          </div>
        </section>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php if( have_rows('about') ): ?>
        <?php while( have_rows('about') ): the_row(); 
        $imageLeft = get_sub_field('image_left');
        $imageRight = get_sub_field('image_right');
        ?>
        <section class="about page__about">
          <div class="about__container">
            <div class="about__image image-decor-ibg about__image_left">
              <?php echo wp_get_attachment_image( $imageLeft, 'full' ); ?>
            </div>
            <div class="about-content about__content">
              <h2 class="title about-content__title"><?php the_sub_field('title')?></h2>
              <?php if( have_rows('about_box') ): ?>
                <div class="about-content__grid">
                <?php while( have_rows('about_box') ): the_row(); ?>
                <div class="about-content__item">
                  <?php
                  if(get_sub_field('about_box-suptitle')){
                    ?>
                    <span class="about-content__item-text"><?php the_sub_field('about_box-suptitle')?></span>
                    <?php
                  }
                  ?>
                  
                  <span class="about-content__item-strong"><?php the_sub_field('about_box-title')?></span>
                  <span class="about-content__item-text">
                    <?php the_sub_field('about_box-text')?>
                  </span>
                </div>
                <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="about__image image-decor-ibg about__image_right">
              <?php echo wp_get_attachment_image( $imageRight, 'full' ); ?>
            </div>
          </div>
        </section>
        <?php endwhile; ?>
      <?php endif; ?>
      <!-- про материал -->
      <?php if( have_rows('lama') ): ?>
        <?php while( have_rows('lama') ): the_row(); 
        $images = get_sub_field('images');
        ?>
      <section class="lama page__lama">
        <div class="lama__container">
           <?php echo wp_get_attachment_image( $images, 'full', false, array('class'  => 'lama__image-bg') ); ?>
          <h2 class="title lama__title"><?php the_sub_field('title')?></h2>
          <p class="lama__desc"><?php the_sub_field('desc')?></p>
          <?php if( have_rows('lama_box') ): ?>
            <div class="lama__grid">
            <?php while( have_rows('lama_box') ): the_row(); $icon = get_sub_field('icon');?>
              <div class="lama__item">
                <div class="lama__icon">
                  <?php echo wp_get_attachment_image( $icon, 'full'); ?>
                </div>
                <p class="lama__text"><?php the_sub_field('lama_box-title')?></p>
              </div>
            <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <h3 class="lama__subtitle"><?php the_sub_field('subtitle')?></h3>
          <button class="button lama__button" type="button" data-type="offerPopup">
            <?php the_sub_field('button_text')?>
          </button>
        </div>
      </section>
        <?php endwhile; ?>
      <?php endif; ?>

      <!-- Галерея -->
      <?php		
        global $post;

        $query = new WP_Query( [
          'posts_per_page' => -1,
          'post_type'        => 'collections',
          'order'            => 'ASC',
          'orderby'          => 'date'
        ] );

        if ( $query->have_posts() ) {
        ?>
      <section class="gallery page__gallery">
        <div class="gallery__container">
          <div class="swiper slider-auto gallery__slider">
            <div class="swiper-wrapper gallery__wrapper">
              <?php
              while ( $query->have_posts() ) {
                $query->the_post();
                ?>
              <div class="swiper-slide gallery__slide-image-ibg">
                <?php the_post_thumbnail()?>
              </div>
                <?php 
              }
              ?>
              </div>
            <div class="swiper-pagination gallery__progress-bar"></div>
          </div>
        </div>
      </section>
      <?php }  wp_reset_postdata(); // Сбрасываем $post ?>

      <?php if( have_rows('offer') ): ?>
        <?php while( have_rows('offer') ): the_row(); 
        $imageLeft = get_sub_field('image_left');
        $imageRight = get_sub_field('image_right');
        ?>
        <section class="about page__offer">
          <div class="about__container">
            <div class="about__image image-decor-ibg about__image_left">
            <?php echo wp_get_attachment_image( $imageLeft, 'full' ); ?>
            </div>
            <div class="about-content about__content">
              <h2 class="title about-content__title"><?php the_sub_field('title')?></h2>
              <?php if( have_rows('offer_box') ): ?>
                <div class="about-content__offer-grid">
                <?php while( have_rows('offer_box') ): the_row(); ?>
                  <div class="about-content__offer-item">
                    <span class="about-content__offer-icon">
                      <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.1666 1.75L9.12492 17.7917L1.83325 10.5" stroke="#141414" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </span>
                    <span class="about-content__offer-text">
                      <?php the_sub_field('offer_box-text')?>
                    </span>
                  </div>
                <?php endwhile; ?>
                </div>
              <?php endif; ?>
              <button class="button about__button" type="button" data-type="offerPopup">
                <?php the_sub_field('button_text')?>
              </button>
            </div>
            <div class="about__image image-decor-ibg about__image_right">
              <?php echo wp_get_attachment_image( $imageRight, 'full' ); ?>
            </div>
          </div>
        </section>
        <?php endwhile; ?>
      <?php endif; ?>   

      <!-- Отзывы -->
      <?php		
        global $post;

        $query = new WP_Query( [
          'posts_per_page' => -1,
          'post_type'        => 'testimonial',
          'order'            => 'ASC',
          'orderby'          => 'date'
        ] );

        if ( $query->have_posts() ) {
        ?>
        <section class="page__testi testi">
          <div class="testi__container">
            <h2 class="title testi__title">Отзывы партнеров</h2>
            <div class="swiper slider-auto testi__slider">
              <div class="swiper-wrapper testi__wrapper">
              <?php
              while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <div class="swiper-slide testi__slide">
                  <div class="testi__slide-title"><?php the_title();?></div>
                  <p class="testi__slide-text">
                    <?php the_field('city_shop')?>
                  </p>
                  <span class="testi__slide-devider"></span>
                  <p class="testi__slide-text testi__slide-text_scroll">
                    <?php the_field('text')?>
                  </p>
                </div>
                <?php 
              }
              ?>
                </div>
              <div class="swiper-pagination testi__progress-bar"></div>
            </div>
          </div>
        </section>
      <?php }  wp_reset_postdata(); // Сбрасываем $post ?>


      <!-- форма -->
      <?php if( have_rows('form') ): ?>
        <?php while( have_rows('form') ): the_row(); 
        $image = get_sub_field('image');
        ?>
        <section class="contact-form page__contact-form">
          <div class="contact-form__container">
            <div class="contact-form__image-ibg">
               <?php echo wp_get_attachment_image( $image, 'full' ); ?>
            </div>
            <div class="contact-form__content">
              <?php echo do_shortcode('[contact-form-7 id="20" title="Форма на сайте" html_class="contact-form__form"]');?>
            </div>
          </div>
        </section>
        <?php endwhile; ?>
      <?php endif; ?>   

    </main>
    <?php get_footer();?>