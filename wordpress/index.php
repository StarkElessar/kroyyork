<?php get_header();?>
    <main class="page">
      <div data-observ></div>
      <section class="page__promo promo">
        <div class="promo__container">
          <div class="promo__content">
            <h1 class="title promo__title">Оптовые поставки пальто Premium — класса</h1>
            <ul class="promo__list">
              <li class="promo__item">
                <span class="icon-check promo__шеуь-icon">
                  <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.1666 1.75L9.12492 17.7917L1.83325 10.5" stroke="#8A728E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
                <span class="promo__item-text">натуральная шерсть альпака и кашемира</span>
              </li>
              <li class="promo__item">
                <span class="icon-check promo__шеуь-icon">
                  <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.1666 1.75L9.12492 17.7917L1.83325 10.5" stroke="#8A728E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
                <span class="promo__item-text">более 100 моделей пальто в 20 цветах</span>
              </li>
              <li class="promo__item">
                <span class="icon-check promo__шеуь-icon">
                  <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M25.1666 1.75L9.12492 17.7917L1.83325 10.5" stroke="#8A728E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
                <span class="promo__item-text">размерный ряд от 40 — до 58</span>
              </li>
            </ul>
            <button class="button promo__button" type="button">Получить оптовый прайс-лист</button>
          </div>
          <div class="promo__image-ibg">
            <img src="<?php echo get_template_directory_uri() ?>/images/promo-bg.png" alt="Women">
          </div>
        </div>
      </section>
      <section class="desc page__desc">
        <div class="desc__container">
          <p class="desc__text">
            Все наши изделия проверены и имеют необходимые сертификаты качества, а также маркированы в соответствии с
            законом о чипировании товаров.
          </p>
          <div class="desc__media slider-desc swiper" data-mobile="false">
            <div class="slider-desc__wrapper swiper-wrapper">
              <div class="slider-desc__image-ibg swiper-slide">
                <img src="<?php echo get_template_directory_uri() ?>/images/desc/01.png" alt="Women">
              </div>
              <div class="slider-desc__image-ibg swiper-slide">
                <img src="<?php echo get_template_directory_uri() ?>/images/desc/02.png" alt="Women">
              </div>
              <div class="slider-desc__image-ibg swiper-slide">
                <img src="<?php echo get_template_directory_uri() ?>/images/desc/03.png" alt="Women">
              </div>
            </div>
            <div class="slider-desc__progress-bar swiper-pagination"></div>
          </div>
        </div>
      </section>
      <section class="contact-form page__contact-form">
        <div class="contact-form__container">
          <div class="contact-form__image-ibg">
            <img src="<?php echo get_template_directory_uri() ?>/images/contact-bg.png" alt="Woman">
          </div>
          <div class="contact-form__content">
            <?php echo do_shortcode('[contact-form-7 id="20" title="Форма на сайте"]');?>
          </div>
        </div>
      </section>
    </main>
    <?php get_footer();?>