<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php wp_title('|', true, 'right'); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- media-queries.js (fallback) -->
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
        <![endif]-->

        <!-- html5.js -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!-- wordpress head functions -->
        <?php wp_head(); ?>
        <link href="<?php echo get_template_directory_uri(); ?>/libs/materialicons/MaterialDesignIcons.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo get_template_directory_uri(); ?>/libs/slickSlider/slick-theme.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo get_template_directory_uri(); ?>/libs/slickSlider/slick.js" type="text/javascript"></script>
        <link href="<?php echo get_template_directory_uri(); ?>/libs/slickSlider/slick.css" rel="stylesheet" type="text/css"/>

        <script src="<?php echo get_template_directory_uri(); ?>/libs/fancybox/lib/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/libs/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <link href="<?php echo get_template_directory_uri(); ?>/libs/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo get_template_directory_uri(); ?>/libs/fancybox/source/helpers/jquery.fancybox-buttons.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo get_template_directory_uri(); ?>/libs/fancybox/source/helpers/jquery.fancybox-buttons.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/libs/fancybox/source/helpers/jquery.fancybox-media.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/libs/jPlayer/jquery.jplayer.js" type="text/javascript"></script>
        

        <script src="<?php echo get_template_directory_uri(); ?>/libs/customFunctionsH.js" type="text/javascript"></script>
        <!-- end of wordpress head -->
        <!--FACEBOOK META -->
        <?php
        if (!is_home() && get_the_ID()) {
            $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            if (get_excerpt_by_id(get_the_ID())) {
                $excerpt = get_excerpt_by_id(get_the_ID());
            } else {
                $excerpt = 'Leer más en http://www.futura.com.ar';
            }
            ?>
            <meta property="og:title" content="<?php the_title(); ?>">
            <meta property="og:type" content="article" /> 
            <meta property="og:url" content="<?php the_permalink(); ?>">
            <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/libs/timthumb.php?src=<?php echo $url; ?>&h=315&w=600&zc=3" />
            <meta property="og:description" content="<?php echo $excerpt; ?>" />
            <?php
        } else {
            ?>
            <meta property="og:title" content="<?php wp_title(); ?>">
            <meta property="og:type"   content="website" /> 
            <meta property="og:url" content="http://www.fmfutura.com.ar">
            <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/libs/timthumb.php?src=<?php echo get_template_directory_uri(); ?>/images/futura-banner.png&h=315&w=600&zc=2" />
            <meta property="og:description" content="" />
            <?php
        }
        ?>
        <!-- theme options from options panel -->
        <?php get_wpbs_theme_options(); ?>

        <!-- typeahead plugin - if top nav search bar enabled -->
        <?php require_once('library/typeahead.php'); ?>
        <?php
        $uploadDir = wp_upload_dir();
        ?>
      <link rel="icon" type="image/png" href="http://fmfutura.com.ar/wp-content/uploads/2015/10/Untitled-2.png" />
    </head>

    <body <?php body_class(); ?>>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <header role="banner">

            <div id="inner-header" class="clearfix">
                <div class="container-fluid site-title">
                    <div class="row-fluid">
                        <div class="span7">
                            <h1><a href="<?php echo home_url(); ?>" title="<?= get_bloginfo('name') ?>"><img src="<?php echo $uploadDir['baseurl'] ?>/2014/08/futura-banner.png" alt="<?= get_bloginfo('name') ?>" /></a></h1>
                        </div>
                        <div class="span5 text-center vivo_container">
                            <!--<div class="pull-right">
                                <iframe id="vivoFrameContainer" style="" src="http://fmfutura.com.ar/vivo/vivo3.html" name="reproductor" marginwidth="0" frameborder="0" height="90" scrolling="No" width="210"></iframe>
                            </div>-->
                            <div id="escuchanosVivo" style="border: none; padding: 3px; margin:0">
<iframe src="http://player2.fmfutura.com.ar" width="325" height="130"> </iframe>
<!--
                                <div id="jquery_jplayer_1" class="jp-jplayer" data-swf="/wp-content/themes/libs/jPlayer/jquery.jplayer.swf"></div>
                                <div class="vivo_icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/auric.png" alt=""/>
                                </div>
                                <div class="vivo_text">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/radiowave-text.png" alt=""/>
                                </div>
                                <div class="vivo_controls">
                                    <div class="play"><a href="" class="mdi mdi-play"></a></div>
                                    <div class="pause"><a href="" class="mdi mdi-pause"></a></div>
                                </div>
-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="navbar navbar-fixed-top">
                    <div class="container-fluid nav-container">
                        <nav role="navigation">
                            <a class="brand" title="<?= get_bloginfo('name') ?>" href="<?php echo home_url(); ?>">Inicio</a>
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>

                            <div class="nav-collapse">
                                <ul id="menu-principal">
                                    <li><a href="#" id="item-secciones">Secciones <i class="icon-chevron-down"></i></a></li>
                                    <li><a href="<?php echo get_site_url(); ?>/seccion/audios/">Audios</a></li>
                                    <li><a href="<?php echo get_site_url(); ?>/seccion/fotografia/">Fotografía</a></li>
                                    <li><a href="<?php echo get_site_url(); ?>/seccion/audiovisuales/">Audiovisuales</a></li>
                                    <li><a href="<?php echo get_site_url(); ?>/seccion/especiales/">Especiales</a></li>
                                    <li><a href="#" id="item-laradio">La Radio <i class="icon-chevron-down"></i></a></li>
                                </ul>
                            </div>
                            <div style="clear:both"></div>
                        </nav>
<!--                        <pre>
                        <?php
                        //print_r(wp_get_nav_menu_items('Secciones'));
                        ?>
                        </pre>-->
                        <div class="container-fluid relative-box">
                            <div>
                                <div class="submenu row-fluid hidden" id="submenu-secciones">
                                    <div class="submenu-side span3">
                                        <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin  ?>
                                    </div>
                                    <div class="submenu-preview span9">
                                        <?php
                                        $secciones = wp_get_nav_menu_items('Secciones');
                                        foreach ($secciones as $seccion) {
                                            $query = query_by_cat($seccion->object_id);
                                            ?>
                                            <div style="display:none" class="preview-seccion row-fluid preview-seccion-<?php echo $seccion->ID ?>">
                                                <header class="span12">
                                                    <h3>
                                                        <a href="<?php echo $seccion->url ?>"><?php echo $seccion->title; ?></a>
                                                    </h3>
                                                    <a class="mas_notas" href="<?php echo $seccion->url ?>">
                                                        <span>+</span> Más notas
                                                    </a>
                                                </header>
                                                <?php
                                                if ($query->have_posts()) {
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                        ?>
                                                        <article class="span6">
                                                            <div>
                                                                <?php
                                                                if (get_post_thumbnail_id(get_the_ID())) {
                                                                    ?>
                                                                    <img src="<?php echo getTimThumbUrl(wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())), 'futura-featured-big') ?>" alt="">
                                                                    <?php
                                                                }
                                                                ?>
                                                                <h3>
                                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                </h3>
                                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                                                <a href="<?php the_permalink(); ?>" class="more-link">Leer más...</a>
                                                            </div>
                                                        </article>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="submenu hidden row-fluid" id="submenu-laradio">
                                    <div class="submenu-side span3">
                                        <?php bones_footer_links(); // Adjust using Menus in Wordpress Admin   ?>
                                    </div>
                                    <div class="submenu-preview span9">
                                        <div class="preview-seccion row-fluid preview-seccion-1868" style="display:none">
                                            <article class="span6">
                                                <h3><a href="/historia/">La Radio</a></h3 >
                                                <p>Radio Futura nació en 1987, cuando la democracia gateaba y en los micrófonos de las nacientes FMs nuestro pueblo comenzaba a descubrir un nuevo modo de hacerse escuchar.
                                                    Desde hace 28 trasmite ininterrumpidamente desde Villa Elvira, La Plata.
                                                    Radio Futura es parte del Foro Argentino de Radios comunitarias.<a href="/historia/" title="Radio Futura - La Historia"><strong> Leer más »</strong></a></p>
                                            </article>
                                            <article class="span6"><br />
                                                <img class="inline" src="<?php echo $uploadDir['baseurl'] ?>/2014/06/farco.jpg" alt="FARCO" />
                                            </article>
                                        </div>
                                        <div class="preview-seccion row-fluid preview-seccion-1869" style="display:none">
                                            <article class="span6">
                                                <h3><a href="/historia/">Programación</a></h3 >
                                                <p>Radio Futura posee una programación de gran diversidad cultural. Con una mirada cercana a las problemáticas sociales y a las  demandas de los sectores organizados del pueblo. Contiene en su grilla propuestas que enriquecen la construcción de una mirada amplia que aporte a la transformación de la comunidad.  <a href="/programacion">Ver grilla de programación</a></p>
                                            </article>
                                            <article class="span6"><br />

                                            </article>
                                        </div>
                                        <div class="preview-seccion row-fluid preview-seccion-1867" style="display:none">
                                            <article class="span6">
                                                <h3><a href="/red-futura/">¿Qué es la Red Futura?</a></h3 >
                                                <p>En la ciudad de la Plata hay pocos medios de comunicación que no son empresas que generan ganancias para sus patrones. Uno de ellos es Radio Futura. De todas las formas geniales que tiene para bancarse, está la red de socios. Enterate cómo participar. <a href="/red-futura/" title="Red Futura"><strong>Leer más »</strong></a></p>
                                            </article>
                                            <article class="span6"><br />
                                                <img src="<?php echo $uploadDir['baseurl'] ?>/2014/06/red-futura.png" alt="Red Futura" />
                                            </article>
                                        </div>
                                        <div class="preview-seccion row-fluid preview-seccion-1870" style="display:none">
                                            <article class="span6">
                                                <h3><a href="/contacto/">Contacto</a></h3 >
                                                <p>Calle 75 esquina 5 n° 497 1/2 - La Plata</p>
                                                <p>radiofuturalaplata@gmail.com</p>
                                                <p>Tel. (0221) 453-8250</p>
                                                <p><a href="/contacto/" title="Radio Futura - Contacto"><strong>Escribinos Ahora!</strong></a></p>
                                            </article>
                                            <article class="span6"><br />
                                                <img src="<?php echo $uploadDir['baseurl'] ?>/2014/06/radio-futura-logo.png" alt="Radio Futura FM 90.5" />
                                            </article>
                                        </div>
                                        <div class="preview-seccion row-fluid preview-seccion-1871" style="display:none">
                                            <article class="span6">
                                                <p>Enterate de los próximos eventos. Recitales, fiestas, transmisiones especiales, peñas, sorteos.</p>
                                            </article>
                                            <article class="span6"><br />
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end .nav-container -->
                </div> <!-- end .navbar -->
            </div> <!-- end #inner-header -->
            <script>
                jQuery(document).ready(function () {
                    /* ****
                     Este es el codigo del submenu y sus previews
                     **** */

                    var hideAll = function () {
                        jQuery('.submenu').addClass('hidden');
                    }

// Si hago HOVER sobre SECCIONES mostrar el SUBMENU
                    jQuery('#item-secciones').hover(function () {
                        hideAll();
                        jQuery('.preview-seccion').hide();
                        jQuery('#submenu-secciones').removeClass('hidden');
                        jQuery('#submenu-secciones .submenu-preview .preview-seccion-1865').show();
                    }, function () {
                    });

// Si hago HOVER sobre LA RADIO mostrar el SUBMENU
                    jQuery('#item-laradio').hover(function () {
                        hideAll();
                        jQuery('.preview-seccion').hide();
                        jQuery('#submenu-laradio').removeClass('hidden');
                        jQuery('#submenu-laradio .submenu-preview .preview-seccion-1868').show();
                    }, function () {
                    });

                    jQuery('header').hover(function () {
                    }, hideAll);

                    // Cargar preview de ACTIVIDADES
                    jQuery.get(jQuery('.menu-item-1871 a').attr('href') + '/feed/', function (data) {
                        var $xml = jQuery(data),
                                html = '';

                        $xml.find("item").slice(0, 2).each(function () {
                            var $this = jQuery(this),
                                    title = $this.find("title").text(),
                                    url = $this.find("link").text(),
                                    description = $this.find("description").text();

                            html += '<article class="span6"><h3><a href="' + url + '">' + title + '</a></h3 >' + description + '</article>';
                        }); // each

                        jQuery('.preview-seccion-1871').html(html);
                    });

                    // Cuando hacemos HOVER sobre una seccion LA RADIO
                    jQuery('#menu-la-radio').on('mouseenter', '.menu-item', function (e) {
                        var $link = jQuery(e.target);

                        jQuery('#submenu-laradio .submenu-preview .preview-seccion').hide();
                        jQuery('#submenu-laradio .submenu-preview .preview-seccion-' + $link.data('id')).show();
                    }); // hover

//                    // Cargar preview de SECCIONES
//                    jQuery('#menu-secciones .menu-item a').each(function(key, value) {
//                        var $link = jQuery(value);
//                        // Traer el feed de cada seccion \ø/
//                        jQuery.get($link.attr('href') + '/feed/', function(data) {
//                            var $xml = jQuery(data),
//                                    html = '';
//
//                            $xml.find("item").slice(0, 2).each(function() {
//                                var $this = jQuery(this),
//                                        title = $this.find("title").text(),
//                                        url = $this.find("link").text(),
//                                        description = $this.find("description").text();
//
//                                html += '<article class="span6"><div><h3><a href="' + url + '">' + title + '</a></h3 >' + description + '</div></article>';
//                            }); // each
//                            var header = '<header class="span12"><h3>' + $link.text() + '</h3><a href="' + $link.attr('href') + '"><span>+</span>Más Notas</a></header><div class="clearfix"></div>'
//                            jQuery('#submenu-secciones .submenu-preview').append('<div style="display:none" class="preview-seccion row-fluid preview-seccion-' + $link.data('id') + '">' + header + html + '</div>');
//
//                        });	// get
//                    }); // each link

                    // Cuando hacemos HOVER sobre una SECCION
                    jQuery('#menu-secciones').on('mouseenter', '.menu-item', function (e) {
                        var $link = jQuery(e.target);

                        jQuery('#submenu-secciones .submenu-preview .preview-seccion').hide();
                        jQuery('#submenu-secciones .submenu-preview .preview-seccion-' + $link.data('id')).fadeIn(1000);
                    }); // hover

                });
            </script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64787376-1', 'auto');
  ga('send', 'pageview');

</script>
        </header> <!-- end header -->
