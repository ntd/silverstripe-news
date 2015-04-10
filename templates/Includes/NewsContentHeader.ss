<% if $Title %><div class="page-header">
	<h1>$Title</h1>
</div><% end_if %><% if $Author && $Published %>
<address><%t News.AUTHOR_PUBLISHED Author=$Author Published=$Published.Format(d M Y) %></address><% else_if $Published %>
<address><%t News.AUTHOR Author=$Author %></address><% else_if $Published %>
<address><%t News.PUBLISHED Published=$Published.Format(d M Y) %></address><% end_if %><% if $Summary %>
<div class="alert alert-info" role="alert">
	$Summary
</div><% end_if %>
