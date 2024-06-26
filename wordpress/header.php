<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <?php wp_head();?>
  <?php if( have_rows('header__repeater', 'option') ): ?>
    <?php while( have_rows('header__repeater', 'option') ): the_row(); ?>
      <?php the_sub_field('header__code')?>
    <?php endwhile; ?>
  <?php endif; ?>
</head>
<body <?php body_class( $class ) ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<header class="header">
      <div class="header__container">
        <?php
        $logo_id = get_theme_mod( 'custom_logo' );
        $logo_image = wp_get_attachment_image_src( $logo_id, 'full' );
        if ( ! empty( $logo_image ) ) :?><a href="<?php echo esc_url( home_url( ) ); ?>" class="header__logo"><img src="<?php echo esc_url( $logo_image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a><?php endif; ?>
          <?php if (get_field('email', 'option')){ ?>
            <a href="mailto:<?php the_field('email', 'option')?>" class="header__link header__link_mail">
              <span class="header__link-icon">
                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.83341 6H29.1667C30.7709 6 32.0834 7.35 32.0834 9V27C32.0834 28.65 30.7709 30 29.1667 30H5.83341C4.22925 30 2.91675 28.65 2.91675 27V9C2.91675 7.35 4.22925 6 5.83341 6Z" stroke="#101010" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M32.0834 9L17.5001 19.5L2.91675 9" stroke="#101010" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
              <span class="header__link-text"><?php the_field('email', 'option')?></span>
            </a>
          <?php  } 
          if (get_field('phone', 'option')){ ?>
            <a href="tel:<?php the_field('phone', 'option')?>" class="header__link header__link_phone callto" id="callto">
              <span class="header__link-icon">
                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M32.0838 25.3801V29.8801C32.0855 30.2979 32.0023 30.7114 31.8396 31.0942C31.6769 31.4769 31.4382 31.8205 31.1389 32.1029C30.8397 32.3854 30.4863 32.6004 30.1016 32.7342C29.7168 32.868 29.3092 32.9177 28.9047 32.8801C24.4171 32.3786 20.1065 30.8014 16.3192 28.2751C12.7957 25.9721 9.80827 22.8994 7.56924 19.2751C5.10463 15.362 3.57085 10.9066 3.09216 6.27015C3.05572 5.85535 3.10364 5.43729 3.23289 5.04258C3.36213 4.64788 3.56987 4.28518 3.84286 3.97758C4.11585 3.66997 4.44812 3.42421 4.81852 3.25593C5.18892 3.08765 5.58932 3.00054 5.99424 3.00015H10.3692C11.077 2.99298 11.7631 3.25076 12.2997 3.72544C12.8364 4.20013 13.1869 4.85932 13.2859 5.58015C13.4706 7.02024 13.813 8.43424 14.3067 9.79514C14.503 10.332 14.5454 10.9155 14.4291 11.4765C14.3128 12.0374 14.0426 12.5523 13.6505 12.9601L11.7984 14.8651C13.8744 18.6205 16.8974 21.7298 20.5484 23.8651L22.4005 21.9601C22.797 21.5568 23.2976 21.2789 23.843 21.1593C24.3883 21.0397 24.9556 21.0833 25.4776 21.2851C26.8007 21.793 28.1754 22.1452 29.5755 22.3351C30.2839 22.4379 30.9309 22.805 31.3934 23.3664C31.8558 23.9278 32.1016 24.6445 32.0838 25.3801Z" stroke="#101010" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
              <span class="header__link-text"><?php the_field('phone', 'option')?></span>
            </a>
          <?php } 
          if (get_field('whatsapp', 'option')){?>
            <a href="<?php the_field('whatsapp', 'option')?>" class="header__link header__link_whatsapp">
              <span class="header__link-icon">
                <img src="<?php echo get_template_directory_uri() ?>/images/whatsapp.png" alt="Whatsapp">
              </span>
              <span class="header__link-text">Написать в WhatsApp</span>
            </a>
          
          <?php } ?>
          

      </div>
    </header>  
<div class="wrapper">
