<% if $ShowEnvironmentNotice %>
	<p class="environment-notice" style="background-color: $EnvironmentColor">
		<b class="short-label">$EnvironmentShortLabel</b>
		<b class="label">$EnvironmentLabel</b>
		<% if $EnvironmentDescription %>
			<i class="description">$EnvironmentDescription</i>
		<% end_if %>
	</p>
	<% include JonoM\\EnvironmentAwareness\\EnvironmentNoticeCss %>
<% end_if %>
