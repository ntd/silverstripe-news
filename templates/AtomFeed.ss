<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<id>{$AbsoluteLink.XML}feed/</id>
	<link type="application/atom+xml" href="{$AbsoluteLink.ATT}feed/" rel="self"/>
	<link type="text/html" href="$AbsoluteLink.ATT" rel="alternate"/>
	<title>$SiteConfig.Title.XML - $Title.XML</title><% if $MetaDescription %>
	<subtitle>$MetaDescription.XML</subtitle><% end_if %><% if $AuthorName %>
	<author>
		<name>$AuthorName.XML</name><% if $AuthorURI %>
		<uri>$AuthorURI.XML</uri><% end_if %><% if $AuthorEmail %>
		<email>$AuthorEmail.XML</email><% end_if %>
	</author><% end_if %><% loop $Children.sort(LastEdited DESC).limit(10) %><% if $First %>
	<updated>$LastEdited.Rfc3339</updated><% end_if %>
	<entry>
		<id>$AbsoluteLink.XML</id>
		<link type="text/html" href="$AbsoluteLink.ATT" rel="alternate"/>
		<title>$Title.XML</title><% if $Summary %>
		<summary>$TXT_val(Summary)</summary><% end_if %><% if $AuthorName %>
		<author>
			<name>$AuthorName.XML</name><% if $AuthorURI %>
			<uri>$AuthorURI.XML</uri><% end_if %><% if $AuthorEmail %>
			<email>$AuthorEmail.XML</email><% end_if %>
		</author><% end_if %>
		<updated>$LastEdited.Rfc3339</updated><% if $Published %>
		<published>$Published.Rfc3339</published><% else %>
		<published>$Created.Rfc3339</published><% end_if %>
		<content type="xhtml">
			<div xmlns="http://www.w3.org/1999/xhtml">
				$XHTML_val(Content)
			</div>
		</content>
	</entry><% end_loop %>
</feed>
