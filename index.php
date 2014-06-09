<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css({.tmp,app}) styles/main.css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/app/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <!-- endbuild -->
</head>
<body ng-app="quiverWordpressApp">
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div class="container" ng-controller="MainCtrl">
    <!-- header -->
    <header class="header" role="banner">
        <!-- header image -->
        <div class="centered-max">
            <img id="header-image" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            <a id="header-text" class="column small-12" href="<?php echo home_url(); ?>">
                <h2><?php echo get_bloginfo('name') ?></h2>
                <h5><?php echo get_bloginfo('description') ?></h5>
            </a>
        </div>

        <!-- nav -->
        <nav class="nav top-bar column small-12" role="navigation">
            <section class="top-bar-section">
                <?php wp_nav_menu(array(
                    'theme_location' => 'nav-menu'
                )) ?>
            </section>

        </nav>
        <!-- /nav -->
    </header>
    <!-- /header -->

    <!--Centered Content-->
    <div class="centered-max">

        <!--posts-->
        <section class="posts column small-12 medium-8 large-10">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <!-- post thumbnail -->
                    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                        <a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
                        </a>
                    <?php endif; ?>
                    <!-- /post thumbnail -->

                    <!-- post title -->
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <!-- /post title -->

                    <!-- post details -->
                    <div class="post-details clearfix">
                        <span class="post-date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
                        <span class="post-author"><?php _e( 'Published by'); ?> <?php the_author_posts_link(); ?></span>
                        <span class="post-comments"><?php comments_popup_link( __( 'Leave your thoughts' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
                    </div>

                    <!-- /post details -->

                    <?php edit_post_link(); ?>

                    <hr/>

                </article>
                <!-- /article -->

            <?php endwhile; ?>

            <?php else: ?>

                <!-- article -->
                <article>
                    <h2><?php _e( 'Sorry, nothing to display.'); ?></h2>
                </article>
                <!-- /article -->

            <?php endif; ?>

        </section>

        <!--sidebar-->
        <section class="sidebar column small-12 medium-4 large-2">
            <?php wp_nav_menu(array(
                'theme_location' => 'sidebar-menu'
            )) ?>
        </section>

    </div>



    <!--footer-->
    <footer class="footer column small-12">
        <?php wp_nav_menu(array(
            'theme_location' => 'footer-menu'
        )) ?>
    </footer>
</div>

<!--Get JavaScript environment variables-->
<script src="<?php echo get_template_directory_uri(); ?>/env.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', window.quiverEnv.analytics);
    ga('send', 'pageview');
</script>

<!--[if lt IE 9]>
<script src="app/lib/es5-shim/es5-shim.js"></script>
<script src="app/lib/json3/lib/json3.min.js"></script>
<![endif]-->

<!-- build:js scripts/vendor.js -->
<!-- bower:js -->
<script src="<?php echo get_template_directory_uri(); ?>/app/lib/angular/angular.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/app/lib/angular-sanitize/angular-sanitize.js"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js({.tmp,app}) scripts/scripts.js -->
<script src="<?php echo get_template_directory_uri(); ?>/app/scripts/app.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/app/scripts/controllers/main.js"></script>
<!-- endbuild -->
</body>
</html>
