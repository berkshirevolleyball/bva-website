<?php
/**
 * A header with a simple basic HTML container for email templates and email signatures
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
*/

?><!DOCTYPE html>
<!--[if lt IE 10]>
<html class="ie ltie10" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !lt IE 10]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico?v=2">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
