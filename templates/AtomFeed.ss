<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<link type="application/atom+xml" href="{$AbsoluteLink}feed/" rel="self"/>
	<title>$SiteConfig.Title.XML - $Title.XML</title><% if $MetaDescription %>
	<subtitle>$MetaDescription.XML</subtitle><% end_if %><% if $AuthorName %>
	<author>
		<name>$AuthorName.XML</name><% if $AuthorURI %>
		<uri>$AuthorURI.XML</uri><% end_if %><% if $AuthorEmail %>
		<email>$AuthorEmail.XML</email><% end_if %>
	</author><% end_if %>
	<id>$AbsoluteLink</id><% loop $Children.sort(LastEdited DESC).limit(10) %><% if $First %>
	<updated>$LastEdited.Rfc3339</updated><% end_if %>
	<entry>
		<link type="text/html" href="$AbsoluteLink.ATT"/>
		<title>$Title.XML</title>
		<summary>$TXT_val(Summary)</summary>
		<id>$AbsoluteLink</id>
		<updated>$LastEdited.Rfc3339</updated>
		<content type="xhtml"><div xmlns="http://www.w3.org/1999/xhtml">$XHTML_val(Content)</div></content>
	</entry><% end_loop %>
</feed>
