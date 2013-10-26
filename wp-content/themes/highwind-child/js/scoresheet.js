jQuery(document).ready(function($){

	function updateTeamName(el) {
		var id = "#" + el,
			className = "." + el;

		$(id).focusout(function() {
			var name = $(this).val();
			if (name !== "") {
				$(className).html(name);
			}
		});
	}

	updateTeamName("team-one");
	updateTeamName("team-two");
	updateTeamName("team-three");
});