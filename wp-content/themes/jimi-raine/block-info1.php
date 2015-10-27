<?php
/**
 * The template used for displaying a simple info block - v1
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */

$copy = get_field('info_block_1');

?>

<?php if ($copy) { ?>
	<section class="info-block-1">
		<div class="row">
			<div class="col three">&nbsp;</div>
			<div class="col six">
				<article>
					<?= $copy; ?>
				</article>
			</div>
		</div>
	</section>
<?php } ?>