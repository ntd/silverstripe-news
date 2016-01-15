silverstripe-news
=================

The [silverstripe-news](http://silverstripe.entidi.com/) module
implements two new page types for handling a typical basic news system:
*NewsHolder* (the folder containing related news) and *NewsPage* (the
page presenting a single news).

Every `NewsHolder` will have its own feed and by default it will render
its children (supposedly all `NewsPage` instances) in a `<dl>` list.

* Should work out-of-the-box.
* Ready to use templates compatible with the
  [silverstrap](http://dev.entidi.com/p/silverstrap/) theme.
* Atom 1.0 feed for every `NewsHolder` instance: it can be accessed by
  specificaly requesting an `application/atom+xml` mime type at the
  `NewsHolder` URL or by accessing the `feed` news underneath it, e.g.
  `http://mysite/news/feed/`.
* Back-end fully localized.
* Author customizable for every `NewsHolder` instance.
* Author customizable for every `NewsPage` instance.

Installation
------------

To install silverstripe-news you should proceed as usual: unpack or copy
the directory tree inside your SilverStripe root directory and do a
`/dev/build/?flush`.

If you use [composer](https://getcomposer.org/), you could just use the
following command instead:

    composer require entidi/silverstripe-news


Support
-------

This project has been developed by [ntd](mailto:ntd@entidi.it). Its
[home page](http://silverstripe.entidi.com/) is shared by other
[SilverStripe](http://www.silverstripe.org/) modules and themes.

To check out the code, report issues or propose enhancements, go to the
[dedicated tracker](http://dev.entidi.com/p/silverstripe-news).
Alternatively, you can do the same things by leveraging the official
[github repository](https://github.com/ntd/silverstripe-news).
