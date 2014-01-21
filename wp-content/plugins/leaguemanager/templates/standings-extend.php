<?php
/**
Template page for the standings table in extended form (default)

The following variables are usable:
	
	$league: contains data about the league
	$teams: contains all teams of current league
	
	You can check the content of a variable when you insert the tag <?php var_dump($variable) ?>
*/
?>

<?php if ( isset($_GET['team']) && !$widget ) : ?>
	<?php leaguemanager_team($_GET['team']); ?>
<?php else : ?>

	<?php if ( $teams ) : ?>
		<div class="leaguemanager-table">
			<table class="leaguemanager standingstable" title="<?php _e( 'Standings', 'leaguemanager' ) .' '.$league->title ?>">
				<tr>
					<th class="num">Position</th>
					<th class="num">&#160;</th>
					<?php if ( $league->show_logo ) : ?>
						<th class="logo">&#160;</th>
					<?php endif; ?>
					<th><?php _e( 'Team', 'leaguemanager' ) ?></th>
					<?php if ( 1 == $league->standings['pld'] ) : ?>
						<th class="num" align="center">Played</th>
					<?php endif; ?>
					<?php if ( 1 == $league->standings['won'] ) : ?>
						<th class="num" align="center"><?php echo _c( 'W|Won','leaguemanager' ) ?></th>
					<?php endif; ?>
					<?php if ( 1 == $league->standings['tie'] ) : ?>
						<th class="num" align="center"><?php echo _c( 'T|Tied','leaguemanager' ) ?></th>
					<?php endif; ?>
					<?php if ( 1 == $league->standings['lost'] ) : ?>
						<th class="num" align="center"><?php echo _c( 'L|Lost','leaguemanager' ) ?></th>
					<?php endif; ?>
					<?php do_action( 'leaguemanager_standings_header_'.$league->sport ) ?>
					<th class="num" align="center">Points Against</th>
					<th class="num" align="center">Points</th>
				</tr>
				<?php if ( $teams ) : ?>
					<?php foreach( $teams AS $team ) : ?>
						<?php
							$points = explode(":", $team->points);
							$pointsFor = $points[0];
							$pointsAgainst = $points[1];
						?>

						<tr class='<?php echo $team->class ?>'>
							<td class='rank'><?php echo $team->rank ?></td>
							<td class="num"><?php echo $team->status ?></td>
							<?php if ( $league->show_logo ) : ?>
								<td class="logo">
									<?php if ( $team->logo != '' ) : ?>
										<img src='<?php echo $team->logoURL ?>' alt='<?php _e('Logo','leaguemanager') ?>' title='<?php _e('Logo','leaguemanager')." ".$team->title ?>' />
									<?php endif; ?>
								</td>
							<?php endif; ?>
							
							<td><?php echo $team->title ?></td>
							<?php if ( 1 == $league->standings['pld'] ) : ?>
								<td class='num' align="center"><?php echo $team->done_matches ?></td>
							<?php endif; ?>
							<?php if ( 1 == $league->standings['won'] ) : ?>
								<td class='num' align="center"><?php echo $team->won_matches ?></td>
							<?php endif; ?>
							<?php if ( 1 == $league->standings['tie'] ) : ?>
								<td class='num' align="center"><?php echo $team->draw_matches ?></td>
							<?php endif; ?>
							<?php if ( 1 == $league->standings['lost'] ) : ?>
								<td class='num' align="center"><?php echo $team->lost_matches ?></td>
							<?php endif; ?>
							<?php do_action( 'leaguemanager_standings_columns_'.$league->sport, $team, $league->point_rule ) ?>
							<td class='num' align="center"><?php echo $pointsAgainst ?></td>
							<td class='num' align="center"><?php echo $pointsFor ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</table>
		</div>
	<?php endif; ?>
<?php endif; ?>
