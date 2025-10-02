<footer class="site-footer">
  <p class="site-footer__text">
    &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
  </p>
  <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
