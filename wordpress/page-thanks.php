<?php get_header('thanks');?>
<main class="page">
      <section class="page__thanks thanks">
        <div class="thanks__text">
          <h1 class="thanks__title">СПАСИБО <br><strong>ЗА ВАШУ ЗАЯВКУ!</strong></h1>
          <p class="thanks__subtitle">В ближайшее время менеджер оптового отдела свяжется с вами для уточнения деталей</p>
          <h2 class="thanks__title"><strong>ВАШ, KROYYORK</strong></h2>
          <a href="<?php echo home_url()?>" class="button thanks__button" >Вернуться на сайт</a>
        </div>
        <div class="thanks__image"><?php the_post_thumbnail()?></div>
      </section>
</main>
<?php get_footer('thanks');?>