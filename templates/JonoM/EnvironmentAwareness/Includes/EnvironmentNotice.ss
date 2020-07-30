<% if $ShowEnvironmentNotice %>
	<p class="environment-notice" style="background-color: $EnvironmentColor"><b>$EnvironmentLabel</b><% if $EnvironmentDescription %> $EnvironmentDescription<% end_if %></p>
	<% include JonoM\\EnvironmentAwareness\\EnvironmentNoticeCss %>
<% end_if %>
