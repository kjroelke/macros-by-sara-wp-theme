<?php ?>
<footer class="footer width-100 bg-dark">
    <div class="container-fluid gx-5">
        <? wp_nav_menu(
                array(
                    'theme-location'=>'primary_menu',
                    'menu_class'=>'footer__menu ',
                    'container'=>'nav',
                    'container_class'=>'navbar',
                ));
                ?>
        <a href="<? esc_url(site_url())?>" class="logo">
            <figure class="logo-img d-inline-block">
                <span aria-label="to Home Page">
                    <? echo bloginfo('name') ?>
                </span>
            </figure>
        </a>
        <div id="copyright">
            <? echo "&copy;&nbsp;" . date("Y") . " Sara Roelke. All Rights Reserved."; ?>
        </div>
    </div>
</footer>
<? wp_footer();?>
</body>

</html>