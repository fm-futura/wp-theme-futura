<footer id="general_footer" role="contentinfo" class="container-fluid">

    <div id="inner-footer" class="clearfix">
        <div id="widget-footer" class="clearfix row-fluid">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1')) : ?>
            <?php endif; ?>
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2')) : ?>
            <?php endif; ?>
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3')) : ?>
            <?php endif; ?>
        </div>

        <p class="creditos pull-right small">Desarrollado por <a href="http://hypnagos.com.ar/">Hypnagos</a> para <a href="http://fmfutura.com.ar/">Futura</a>.</p>

    </div> <!-- end #inner-footer -->

</footer> <!-- end footer -->

<!--[if lt IE 7 ]>
        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

<?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>
