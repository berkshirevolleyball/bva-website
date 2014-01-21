<?php
/**
Template page for the match table

The following variables are usable:
	
	$league: contains data of current league
	$matches: contains all matches for current league
	$teams: contains teams of current league in an assosiative array
	$season: current season
	
	You can check the content of a variable when you insert the tag <?php var_dump($variable) ?>
*/
?>
<?php if (isset($_GET['match']) ) : ?>
	<?php leaguemanager_match($_GET['match']); ?>
<?php else : ?>

	<?php if ($league->match_days && $league->mode != 'championship') : ?>
		<div>
			<form method='get' action='<?php the_permalink(get_the_ID()) ?>'>
				<div>
					<input type='hidden' name='page_id' value='<?php the_ID() ?>' />
					<input type="hidden" name="season" value="<?php echo $season ?>" />
					<input type="hidden" name="league_id" value="<?php echo $league->id ?>" />

					<select size='1' name='match_day'>
						<?php for ($i = 1; $i <= $league->num_match_days; $i++) : ?>
							<option value='<?php echo $i ?>'<?php if ($leaguemanager->getMatchDay($league->isCurrMatchDay) == $i) echo ' selected="selected"'?>><?php printf(__( '%d. Match Day', 'leaguemanager'), $i) ?></option>
						<?php endfor; ?>
					</select>
					<select size="1" name="team_id">
						<option value=""><?php _e( 'Choose Team', 'leaguemanager' ) ?></option>
						<?php foreach ( $teams AS $team_id => $team ) : ?>
							<?php $selected = (isset($_GET['team_id']) && $_GET['team_id'] == $team_id) ? ' selected="selected"' : ''; ?>
							<option value="<?php echo $team_id ?>"<?php echo $selected ?>><?php echo $team['title'] ?></option>
						<?php endforeach; ?>
					</select>
					<input class="button" type='submit' value='<?php _e('Show') ?>' />
				</div>
			</form>
		</div>
	<?php endif; ?>
			
	<?php if ($matches) { ?>
		<?php $prevLocation = ""; ?>
		<?php $prevDate = ""; ?>
		<?php $prevStart_time = ""; ?>

		<table class='leaguemanager matchtable' summary='' title='<?php echo __( 'Match Plan', 'leaguemanager' )." ".$league->title ?>'>
			<tr>
				<th class='match'><?php _e('Match', 'leaguemanager') ?></th>
				<th class='score'><?php _e('Score', 'leaguemanager') ?></th>
				<th class='sets'><?php _e('Sets', 'leaguemanager') ?></th>
			</tr>
			<?php foreach ($matches AS $match) { ?>
				<?php if (($prevLocation != $match->location) || ($prevDate != $match->date) || ($prevStart_time != $match->start_time)) { ?>
					<tr class='info <?php echo $match->class ?>'>
						<td colspan="3">
							<span class="triangle-id">
								<?php 
									/*
									if (!empty($match->custom)) {
										foreach ($match->custom AS $field) {
											foreach ($field AS $custom) {
												if ($custom['triangle_number'] != '') {
													echo $custom['triangle_number'] . " - ";
												}
											}
										}
									}
									*/
								?>
							</span>
							<span class="date"><?php echo $match->date; ?> - </span>
							<span class="location"><?php echo $match->location; ?>, </span>
							<span class="start_time"><?php echo $match->start_time; ?></span>
						</td>
					</tr>
				<?php } ?>

				<?php $sets = array();
					foreach ((array)$match->sets AS $j => $set) {
						if (!empty($set['home']) && !empty($set['away'])) {
							$sets[] = implode(":", $set);
						}
					}
				?>
				<tr class='<?php echo $match->class ?>'>
					<td>
						<a href="<?php echo $match->pageURL ?>">
							<?php echo $match->title; ?>
						</a>
					</td>
					<td><?php echo $match->score; ?></td>
					<td><?php echo implode(", ", $sets); ?></td>
				</tr>

				<?php $prevLocation = $match->location; ?>
				<?php $prevDate = $match->date; ?>
				<?php $prevStart_time = $match->start_time; ?>

			<?php } ?>
		</table>

	<?php } ?>

<?php endif; ?>
