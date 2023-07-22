</div>
  <?php wp_footer();?>
  <?php if( have_rows('footer__repeater', 'option') ): ?>
    <?php while( have_rows('footer__repeater', 'option') ): the_row(); ?>
      <?php the_sub_field('footer__code')?>
    <?php endwhile; ?>
  <?php endif; ?>
</body>

</html>