<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Namespaced
 * @since Namespaced 1.0
 */

$GLOBALS['canRegister'] = false;

$userId = isset($_GET['u']) ? $_GET['u'] : (
    isset($_COOKIE['userId']) ? $_COOKIE['userId'] : NULL
);
$agencyId = isset($_GET['a']) ? $_GET['a'] : (
    isset($_COOKIE['agencyId']) ? $_COOKIE['agencyId'] : NULL
);

if ($userId !== NULL && $agencyId !== NULL) {
	$GLOBALS['canRegister'] = true;
	$GLOBALS['registrationUrl'] = 'https://paycircle.me/#/registration/' . $agencyId . '/' . $userId;

	setcookie('userId', $userId, time()+1800);		// Store cookie for half an hour
	setcookie('agencyId', $agencyId, time()+1800);	// Store cookie for half an hour
}


$featureImage = get_field('feature_image');
$backgroundImage = '';

if ($featureImage) {
	$backgroundImageSrc = get_image_src(get_field('feature_image'), 'hero');
	$backgroundImage = $backgroundImageSrc !== '' ? ' style="background-image:url(' . $backgroundImageSrc . ')"' : '';
}

?><!DOCTYPE html>
<!--[if lt IE 10]>
<html class="ie ltie10" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !lt IE 10]><!-->
<html <?php language_attributes(); ?> >
<!--<![endif]-->
<head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="google-site-verification" content="caTRKAqS86_jftvRNS6R2d6A1EFtBJDXB2XJV3p7O_Q" />
	
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Shivs - IE -->
	<!--[if lte IE 8]><script src="<?php echo get_stylesheet_directory_uri(); ?>/css/ie/html5shiv.js"></script><![endif]-->

	<!-- Javascript -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>

	<!-- Css -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/global.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?=$backgroundImage; ?>>

	<!-- Header -->
	<?php get_template_part( 'nav' ); ?>

	<!-- Spotify Follow 
	<iframe src="https://embed.spotify.com/follow/1/?uri=spotify:user:jimiraine&size=basic&theme=dark&show-count=0" width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
	-->
