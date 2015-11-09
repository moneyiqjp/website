</div> <!-- /container -->
<footer class="blog-footer">
    <div class="footer footer-top">
        <div class="wrapper">
            <div class="footer-half">お金の管理をもっと賢く。MoneyIQスママネーメールマガジン。</div><div class="footer-half">
                <input type="text" placeholder="E-mailアドレス" />
                <div class="email-btn animated smooth-transition">いますぐ登録</div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer footer-bottom">
        <div class="wrapper">
            <div class="footer-half">Copyright &copy; MoneyIQ</div>
            <nav>
                <ul>
                    <?php
                    $menu_name = 'internal-links';
                    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        foreach ( (array) $menu_items as $key => $menu_item ) {
                            echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </div>
    </div>

    <div id="email-message" title="">
                <span style="font-size:18px;font-weight:bold;">
                    ありがとうございました！</span>
        </p>
        <p>
            下記のE-mailアドレスを登録しました。<br><b><span id="js-registered-email"></span></b>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
</body>
</html>