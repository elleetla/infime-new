<?php $id = $post->ID; ?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<title><?php wp_title('•', true, 'right'); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Specifique 2016 - Modification
	<link rel='stylesheet' id='style-css'  href='<?php bloginfo('template_url'); ?>/style.css' type='text/css' media='all' />-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
	You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->


<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid"><!-- container -->
    <div class="navbar-header"><!-- navbar-collapse -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <div id="headerimg">
        <h1>
          <a href="<?php echo get_option('home'); ?>">

 	<?php if($id==94){ ?>
	    <a href="<?php the_permalink(); ?>"><img class="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_black_menu.png"><?php bloginfo('name'); ?></a>
        <a href="<?php the_permalink(); ?>"><img class="logo-rsp" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_black_menu.png"><?php bloginfo('name'); ?></a>
        <?php }else{ ?>
	    <img class="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_white_menu.png"><?php bloginfo('name'); ?>
            <img class="logo-rsp" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_white_menu.png"><?php bloginfo('name'); ?>
	<?php } ?>

          </a>
        </h1>
        
        <h2 class="description">
          <?php bloginfo('description'); ?>
        </h2>
        <div class="clr"></div>
      </div>
	  
	  

    </div>

<ul id="nav2">
	<li><a href="<?php echo $site; ?>notre-agence/" id="topMenu1"  <?php if($id==94){ ?>class="vosProjets"<?php } ?>>De notre image...</a></li>
	<li><a href="<?php echo $site; ?>vos-projets/" id="topMenu2"  <?php if($id==94){ ?>class="vosProjets"<?php } ?>>... à vos images</a></li>
</ul>
    <div class="collapse navbar-collapse" id="navbar">
        <!--<?php
            wp_nav_menu( array(
                'theme_location'    => 'navbar-left',
                'depth'             => 2,
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>-->
        
        <!--<?php get_template_part('includes/navbar-search'); ?>-->
        <?php if($id!=94){ ?>
            <?php
                wp_nav_menu( array(
                    'theme_location'    => 'navbar-right',
                    'depth'             => 2,
                    'menu_class'        => 'nav navbar-nav navbar-right',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>
	    <?php } ?>
	
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container -->
</nav>
</header>