<div id="NewsHolder" class="container">
	<% include Content %><% if $Children %>
	<div class="col-md-12">
		<dl class="dl-horizontal"><% loop $Children %>
			<dt><span class="label label-default">$Published.Format(d M Y)</span></dt>
			<dd>
				<article>
					<h4>
						<a href="$Link"><% if $MenuTitle %>$MenuTitle<% else %>$Title<% end_if %></a>
					</h4><% if $Summary %>
					<div>$Summary</div><% end_if %>
				</article>
			</dd><% end_loop %>
		</ul>
	</div><% else %>
	<div class="alert alert-success alert-dismissible" role="alert">
		<%t News.NO_NEWS %>
	</div><% end_if %>
</div>
