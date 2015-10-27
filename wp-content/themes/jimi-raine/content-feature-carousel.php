<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Paycircle
 * @since Paycircle 1.0
 */

$featureId = isset($_GET['feature']) ? $_GET['feature'] : '';

?>

<section id="feature-carousel" class="feature-carousel" data-selected="<?= $featureId; ?>">

	<!-- Feature 1 -->
	<div id="feature-1" class="feature feature-1 selected">
		<div class="detail">
			<h1>'£70' or '£40 plus expenses'</h1>
			<p>Which would you choose?</p>
			<div class="row no-margin">
				<div class="col four">
					<article>
						<h3>£70 day rate</h3>
						<p>If your agency pays you a day rate of £70 - you'll pay tax on the whole amount when it's likely you should be taxed on less.</p>
						<p>Take the example here and say the cost of your travel and meals away from home are £30. In some cases, under HMRC regulations, you don't have to pay tax on these things.</p>
					</article>
				</div>
				<div class="col four">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/paycircle-diagram-70-40.png" alt="Itinerary" />
				</div>
				<div class="col four">
					<article>
						<h3>£40 day rate + <em>£30 travel</em></h3>
						<p>Paycircle always structures your pay as salary plus expenses if we can. This way you only pay tax on £40 so you can relax knowing you're not overpaying tax.</p>
						<p>And how do we know what your expenses are likely to be?</p>
						<p>By using your daily booking information to work out a typical itinerary.</p>
					</article>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Feature 2 -->
	<div id="feature-2" class="feature feature-2">
		<div class="detail">

			<h1>A typical working day</h1>
			<p>Tax Tracker works it all out in the background - so you don't have to!</p>

			<div class="row no-margin">
				<div class="col six">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/paycircle-itinerary.png" alt="A typical Paaycircle itinerary" width="400" />
				</div>
				<div class="col one">&nbsp;</div>
				<div class="col five">
					<article>
						<p>Keeping track of all your expenses every day would be a total headache.</p>
						<p>Claiming back your tax means knowing the rules and doing all of the paperwork.</p>
						<p>With Tax Tracker the whole process is automated so you don't have to do a thing - just enjoy the extra pennies rolling in on payday.</p>
						<p>Paycircle charges 10% of any of any savings uncovered. If you take home an extra £10 that's just £1 for us.</p>
						<p>If you don't save, there's no fee - so it costs nothing to have Paycircle track your tax.</p>
						<span><em>You'll only be better off with Tax Tracker!</em></span>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/smudge-divider-3-yellow.png" />
					</article>
				</div>
			</div>

			<p class="next-step"><a href="#worked-examples">See some simple worked examples &#9660;</a></p>

		</div>
	</div>

	<nav>
		<a id="nav-feature-1" href="#feature-1" class="selected"></a>
		<a id="nav-feature-2" href="#feature-2"></a>
	</nav>

</section>


<script type="text/javascript">
	$(document).ready(function () {

		var featureCarousel = $('#feature-carousel');
		var features = $('.feature', featureCarousel);
		var navItems = $('nav a', featureCarousel);
		var selectedFeatureId = featureCarousel.data('selected');

		navItems.on('click', function (event) {

			event.preventDefault();

			var item = $(this);

			if (!item.hasClass('selected')) {

				// Remove selected class from all nav items
				navItems.each(function () {
					$(this).removeClass('selected');
				});

				// Remove selected class from all features
				features.each(function () {
					$(this).removeClass('selected');
					$(this).removeClass('fadeIn');
				});

				// Find newly clicked answer and add selected class
				var $featureElem = $($(this).attr('href'));
				$(this).addClass('selected');
				$featureElem.addClass('selected');
				$featureElem.addClass('fadeIn');

			}

		});

		// Select feature from url parameter
		console.log(selectedFeatureId);
		if (selectedFeatureId !== '') {
			$('#nav-feature-' + selectedFeatureId).click();
		}

	});
</script>
