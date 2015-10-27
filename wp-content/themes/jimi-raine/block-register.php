<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */
?>

<?php if ($GLOBALS['canRegister']) { ?>
	<section class="register-cta">
		<p>Got your invite from your agency? <a href="<?= $GLOBALS['registrationUrl']; ?>" class="button large">Let's get started</a></p>
	</section>
<?php } ?>
