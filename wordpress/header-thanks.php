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
  <div class="wrapper">