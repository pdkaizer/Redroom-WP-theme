<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section.
 *
 * @package red-room
 */
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<meta name="google-site-verification" content="pJOgBO9fn8n_4bx_lhJszYYOPAm8Z5Jg5XI4h2H4T8w" />
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<?php wp_head(); ?>
		
		<script src="<?php bloginfo('template_url');?>/js/modernizr-2.6.2-min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script src="<?php bloginfo('template_url');?>/js/html5shiv.js"></script>
           <script src="<?php bloginfo('template_url');?>/js/respond.min.js"></script>
        <![endif]-->

    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/jasny-bootstrap.css">

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-16552996-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>


	</head>
	
	<body <?php body_class(); ?>>
	<div id="bg"></div>

      <header class="container">

        <div class="row">

         <div class="col-md-9 hidden-xs header">
          <div class="row">
            <div class="col-sm-6"><a href="/"><img src="<?php bloginfo('template_url');?>/images/red-room-logo.png" alt="The Red Room"></a></div>
            <div class="col-sm-6">
              <div id="sb-search" class="sb-search">
            <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
              <input class="sb-search-input" placeholder="Search the Red Room" type="text" value="" name="s" id="search">
              <input class="sb-search-submit" type="submit" value="">
              <span class="sb-icon-search"></span>
            </form>
            </div>
            </div>
          </div>

         </div>

         <div class="col-md-3 hidden-sm hidden-xs">
           <div class="social">
            <p><a href="https://www.facebook.com/groups/highzero/"><i class="fa fa-facebook-official fa-3x"></i></a>&nbsp;&nbsp;<a href="https://www.instagram.com/highzerofoundation/"><i class="fa fa-instagram fa-3x"></i></a>&nbsp;&nbsp;<a href="https://twitter.com/highzero"><i class="fa fa-twitter-square fa-3x"></i></a>&nbsp;&nbsp;<a href="https://www.youtube.com/user/highzerofoundation"><i class="fa fa-youtube-square fa-3x"></i></a></p>
           </div>
         </div>


        </div>

        <div class="row">
          <div class="col-md-9 hidden-xs">
            <?php wp_nav_menu( array('menu' => 'Main menu', 'container' => '', 'items_wrap' => '<ul class="nav nav-justified">%3$s</ul>' )); ?>
          </div>

          <!-- Off canvas menu for mobile -->
          <div class="col-md-9 visible-xs">

            <!-- Static navbar -->
            <div class="navbar navbar-fixed-top navbar-default">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navbar-offcanvas" data-canvas="body">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                <a class="navbar-brand" href="/" style="color:#fff; font-size: 26px; margin-left:20px;">THE RED ROOM</a>
                </div>
                <div class="navbar-offcanvas offcanvas">
                  <a class="navmenu-brand" href="/"><strong>THE RED ROOM</strong></a>
                    <ul class="nav navbar-nav">
                      <li><a href="/" style="color:#fff;"><strong>Calendar</strong></a></li>
                      <li><a href="/series" style="color:#fff;"><strong>Series</strong></a></li>
                      <li><a href="/booking" style="color:#fff;"><strong>Bookings</strong></a></li>
                      <li><a href="/event-archive" style="color:#fff;"><strong>Archive</strong></a></li>
                      <li><a href="/directions" style="color:#fff;"><strong>Directions</strong></a></li>
                      <li><a href="/donate" style="color:#fff;"><strong>Donate</strong></a></li>
                      <li><form class="navbar-form" role="search" style="width: 300px; margin-left:5px;">
                          <div class="input-group add-on">
                            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                            <div class="input-group-btn">
                              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </li>
                    </ul>
                </div><!--/.nav-collapse -->
              </div>

          </div>

        </div>

      </header>