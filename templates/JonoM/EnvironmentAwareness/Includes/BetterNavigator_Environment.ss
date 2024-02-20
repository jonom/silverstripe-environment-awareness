<% if $ShowEnvironmentNotice %>
	<style>
		#BetterNavigatorStatus:after {
			content: "{$EnvironmentLabel}";
			background-color: $EnvironmentColor;
			padding: 0.35em .5em .2em;
			margin: 0 .7em 0 .35em;
			border-radius: 0.3em;
			border: 1px solid #fff;
			color: #fff;
		}

		#BetterNavigator.layoutV2 #BetterNavigatorStatus:after {
			margin: 0;
		}

		#BetterNavigator.layoutV2:not(.collapsed) #BetterNavigatorStatus:after {
			display: none;
		}

		#BetterNavigator.layoutV2:not(.collapsed) #BetterNavigatorContent:before {
			content: "{$EnvironmentLabel}";
			background-color: $EnvironmentColor;
			padding: 8px 8px 8px 17px;
			margin: -8px -8px 0 -8px;
			color: #fff;
		}

		#BetterNavigator.collapsed #BetterNavigatorStatus:after {
			margin-right: -.4em;
		}
	</style>
<% end_if %>
