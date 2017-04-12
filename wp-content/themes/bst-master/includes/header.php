<?php $id = $post->ID; ?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<title><?php wp_title('•', true, 'right'); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid"><!-- container -->
            <div class="navbar-header"><!-- navbar-header -->
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
                            <img class="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_black_menu.png"><?php bloginfo('name'); ?>
                            <img class="logo-rsp" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_black_menu.png"><?php bloginfo('name'); ?>
                        <?php }else{ ?>
                            <img class="logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_white_menu.png"><?php bloginfo('name'); ?>
                            <img class="logo-rsp" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_white_menu.png"><?php bloginfo('name'); ?>
                        <?php } ?>
                        </a>
                    </h1>
                </div>
            </div><!-- /.navbar-header -->

            <ul id="nav2">
                <li><a href="notre-agence/" id="topMenu1"  <?php if($id==94){ ?>class="vosProjets"<?php } ?>>De notre image...</a></li>
                <li><a href="vos-projets/" id="topMenu2"  <?php if($id==94){ ?>class="vosProjets"<?php } ?>>... à vos images</a></li>
            </ul>

            <div class="collapse navbar-collapse" id="navbar">
                <?php if($id!=94){ ?>
                <?php wp_nav_menu( array(
                    'theme_location'    => 'navbar-right',
                    'depth'             => 2,
                    'menu_class'        => 'nav navbar-nav navbar-right') );
                ?>
                <?php } ?>
            </div><!--/.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>