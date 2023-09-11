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
              <svg xmlns="http://www.w3.org/2000/svg" width="27" height="28" viewBox="0 0 27 28" fill="none">
                <path d="M4.5 4.66675H22.5C23.7375 4.66675 24.75 5.71675 24.75 7.00008V21.0001C24.75 22.2834 23.7375 23.3334 22.5 23.3334H4.5C3.2625 23.3334 2.25 22.2834 2.25 21.0001V7.00008C2.25 5.71675 3.2625 4.66675 4.5 4.66675Z" stroke="#101010" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M24.75 7L13.5 15.1667L2.25 7" stroke="#101010" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              </span>
              <span class="header__link-text"><?php the_field('email', 'option')?></span>
            </a>
          <?php  } 
          if (get_field('phone', 'option')){ ?>
            <a href="tel:<?php the_field('phone', 'option')?>" class="header__link header__link_phone callto" id="callto">
              <span class="header__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                <path d="M25.6669 19.74V23.24C25.6682 23.5649 25.6017 23.8866 25.4715 24.1843C25.3413 24.482 25.1504 24.7492 24.911 24.9689C24.6716 25.1885 24.3889 25.3558 24.0811 25.4599C23.7733 25.5639 23.4472 25.6026 23.1236 25.5734C19.5336 25.1833 16.0851 23.9565 13.0552 21.9917C10.2364 20.2005 7.84647 17.8106 6.05525 14.9917C4.08356 11.9481 2.85653 8.48286 2.47358 4.8767C2.44443 4.55408 2.48277 4.22892 2.58616 3.92193C2.68956 3.61494 2.85575 3.33284 3.07414 3.09359C3.29254 2.85434 3.55835 2.66319 3.85467 2.53231C4.15099 2.40142 4.47131 2.33367 4.79525 2.33337H8.29525C8.86144 2.32779 9.41034 2.52829 9.83964 2.89749C10.2689 3.26668 10.5493 3.77939 10.6286 4.34003C10.7763 5.46011 11.0503 6.55988 11.4452 7.61836C11.6022 8.03594 11.6362 8.48977 11.5431 8.92606C11.4501 9.36235 11.2339 9.76283 10.9202 10.08L9.43858 11.5617C11.0994 14.4825 13.5178 16.9009 16.4386 18.5617L17.9202 17.08C18.2375 16.7664 18.6379 16.5502 19.0742 16.4571C19.5105 16.3641 19.9643 16.3981 20.3819 16.555C21.4404 16.95 22.5402 17.224 23.6602 17.3717C24.227 17.4516 24.7446 17.7371 25.1145 18.1738C25.4845 18.6104 25.6811 19.1679 25.6669 19.74Z" stroke="#101010" stroke-linecap="round" stroke-linejoin="round"/>
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
