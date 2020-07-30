<% if $ShowEnvironmentNotice %>
	<style type="text/css">
		#BetterNavigatorStatus:after {
			content: "{$EnvironmentLabel}";
			background-color: $EnvironmentColor;
			padding: 0.35em .5em .2em;
			margin: 0 .7em 0 .35em;
			border-radius: 0.3em;
			border: 1px solid #fff;
		}

		#BetterNavigator.collapsed #BetterNavigatorStatus:after {
			margin-right: -.4em;
		}
	</style>
<% end_if %>
