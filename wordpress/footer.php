    <footer class="footer">
      <div class="footer__container">
        <div class="footer__content">
          <?php $footerLogo = get_field('footer__logo', 'option')?>
           <a href="<?php echo esc_url( home_url( ) ); ?>" class="footer__logo"><?php echo wp_get_attachment_image( $footerLogo, 'full' ); ?></a>

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
              if (get_field('whatsapp', 'option')){?><a href="<?php the_field('whatsapp', 'option')?>" class="footer__social-link footer__social-link_whatsapp" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/whatsapp.png" alt="Whatsapp"></a><?php }       
              if (get_field('facebook', 'option')){ ?> <a href="<?php the_field('facebook', 'option')?>" class="footer__social-link footer__social-link_facebook" target="_blank"> <img src="<?php echo get_template_directory_uri() ?>/images/icons/facebook.svg" alt="Facebook"></a><?php  } 
              if (get_field('vk', 'option')){ ?> <a href="<?php the_field('vk', 'option')?>" class="footer__social-link footer__social-link_vk" target="_blank"> <img src="<?php echo get_template_directory_uri() ?>/images/icons/vk.svg" alt="VK"></a><?php  } 
              if (get_field('telegram', 'option')){ ?> <a href="<?php the_field('telegram', 'option')?>" class="footer__social-link footer__social-link_telegram" target="_blank"> <img src="<?php echo get_template_directory_uri() ?>/images/icons/telegram.svg" alt="telegram"></a><?php  } 
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
      <?php echo do_shortcode('[contact-form-7 id="20" title="Форма на сайте" html_class="contact-form__form"]');?>
    </div>
  </div>

  <?php wp_footer();?>
  <?php if( have_rows('footer__repeater', 'option') ): ?>
    <?php while( have_rows('footer__repeater', 'option') ): the_row(); ?>
      <?php the_sub_field('footer__code')?>
    <?php endwhile; ?>
  <?php endif; ?>
</body>

</html>