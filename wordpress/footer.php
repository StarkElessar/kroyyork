    <footer class="footer">
      <div class="footer__container">
        <div class="footer__content">
          <?php
          $logo_id = get_theme_mod( 'custom_logo' );
          $logo_image = wp_get_attachment_image_src( $logo_id, 'full' );
          if ( ! empty( $logo_image ) ) :?>
            <a href="<?php echo esc_url( home_url( ) ); ?>" class="footer__logo"><img src="<?php echo esc_url( $logo_image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
          <?php endif; ?>
          <div class="footer__column footer__column_address">
            <h3 class="footer__title">Адрес нашего шоу-рума / оптового отдела</h3>
            <?php    
            if (get_field('address', 'option')){
            ?>
            <p class="footer__text"><?php the_field('address', 'option')?></p>
            <?php
          }
          if (get_field('office_hours', 'option')){
            ?>
            <p class="footer__text"><?php the_field('office_hours', 'option')?></p>
            <?php
          }   
          ?>
          </div>
          <div class="footer__column footer__column_contact">
            <h3 class="footer__title">Телефон и e-mail отдела оптовых закупок</h3>
            <?php
            if (get_field('phone', 'option')) { ?><a href="tel:<?php the_field('phone', 'option')?>" class="footer__link"><?php the_field('phone', 'option')?></a><?php }       
            if (get_field('email', 'option')) { ?><a href="mailto:<?php the_field('email', 'option')?>" class="footer__link"><?php the_field('email', 'option')?></a><?php }?>
          </div>
          <div class="footer__social">
            <?php
              if (get_field('whatsapp', 'option')){?><a href="<?php the_field('whatsapp', 'option')?>" class="footer__social-link footer__social-link_whatsapp"><img src="<?php echo get_template_directory_uri() ?>/images/whatsapp.png" alt="Whatsapp"></a><?php }       
              if (get_field('facebook', 'option')){ ?> <a href="<?php the_field('facebook', 'option')?>" class="footer__social-link footer__social-link_facebook"> <img src="<?php echo get_template_directory_uri() ?>/images/icons/facebook.svg" alt="Facebook"></a><?php  } 
              if (get_field('vk', 'option')){ ?> <a href="<?php the_field('vk', 'option')?>" class="footer__social-link footer__social-link_vk"> <img src="<?php echo get_template_directory_uri() ?>/images/icons/vk.svg" alt="VK"></a><?php  } 
              if (get_field('telegram', 'option')){ ?> <a href="<?php the_field('telegram', 'option')?>" class="footer__social-link footer__social-link_telegram"> <img src="<?php echo get_template_directory_uri() ?>/images/icons/telegram.svg" alt="telegram"></a><?php  } 
              ?>

          </div>
        </div>
        <div class="footer__bottom">
          <p class="footer__text-bottom footer__text-bottom_copyright">© kroyyork, <?php echo date("Y"); ?>, все права защищены</p>
          <p class="footer__text-bottom footer__text-bottom_policy">Политика конфиденциальности</p>
          <?php if (get_field('design', 'option')){ ?> <p class="footer__text-bottom footer__text-bottom_design"><?php the_field('design', 'option')?></p> <?php } ?>
        </div>
      </div>
    </footer>
  </div>
  <div class="_overlay-bg offer-popup" data-popup="offerPopup">
    <div class="offer-popup__body">
      <button class="button-close offer-popup__close" type="button"></button>
      <form class="contact-form__form">
        <h2 class="title contact-form__title">Получите оптовое предложение</h2>
        <p class="contact-form__text">Контактные данные</p>
        <div class="contact-form__field">
          <input class="contact-form__input" type="text" placeholder="Имя*" name="userName">
        </div>
        <div class="contact-form__field">
          <input class="contact-form__input" type="tel" placeholder="Телефон*" name="userPhone">
        </div>
        <div class="contact-form__field">
          <input class="contact-form__input" type="email" placeholder="E-mail" name="userEmail">
        </div>
        <div class="contact-form__box">
          <button class="button contact-form__button" type="submit">
            Получить
          </button>
          <p class="contact-form__text-info">
            Нажимая на кнопку, вы соглашаетесь на обработку персональных данных в соответствии с Политикой
            конфиденциальности.
          </p>
        </div>
      </form>
    </div>
  </div>
  <?php wp_footer();?>

</body>

</html>