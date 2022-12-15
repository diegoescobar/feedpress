<footer class="section">
      <?php /*<div class="container">
        <div class="pb-5 is-flex is-flex-wrap-wrap is-justify-content-between is-align-items-center">
          <div class="mr-auto mb-2">
            <a class="is-inline-block" href="#">
              <?php the_logo_thumbnail(); ?>
          </div>
          <div>
            <ul class="is-flex is-flex-wrap-wrap is-align-items-center is-justify-content-center">
              <li class="mr-4"><a class="button is-white" href="#">About</a></li>
              <li class="mr-4"><a class="button is-white" href="#">Company</a></li>
              <li class="mr-4"><a class="button is-white" href="#">Services</a></li>
              <li><a class="button is-white" href="#">Testimonials</a></li>
            </ul>
          </div>
        </div>
      </div>*/?>
      <div class="pt-5" style="border-top: 1px solid #dee2e6;"></div>
      <div class="container">
        <div class="is-flex-tablet is-justify-content-between is-align-items-center">
          <p>All rights reserved © <?php echo get_bloginfo('name'); ?> <?php echo date('Y');?></p>
          <div class="py-2 is-hidden-tablet"></div>
          <div class="ml-auto">
            <a class="mr-4 is-inline-block" href="#">
              <img src="https://bulmatemplates.github.io/bulma-templates/images/app-page/socials/facebook.svg" alt=""></a>
            <a class="mr-4 is-inline-block" href="#">
              <img src="https://bulmatemplates.github.io/bulma-templates/images/app-page/socials/twitter.svg" alt=""></a>
            <a class="mr-4 is-inline-block" href="#">
              <img src="https://bulmatemplates.github.io/bulma-templates/images/app-page/socials/github.svg" alt=""></a>
            <a class="mr-4 is-inline-block" href="#">
              <img src="https://bulmatemplates.github.io/bulma-templates/images/app-page/socials/instagram.svg" alt=""></a>
            <a class="is-inline-block" href="#">
              <img src="https://bulmatemplates.github.io/bulma-templates/images/app-page/socials/linkedin.svg" alt=""></a>
          </div>
        </div>
      </div>
    </footer>
    </div>


<script async type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bulma.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/js/OverlayScrollbars.min.js'></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        //The first argument are the elements to which the plugin shall be initialized
        //The second argument has to be at least a empty object or a object with your desired options
        OverlayScrollbars(document.querySelectorAll("body"), { });
        });
    </script>
</body>

</html>