=== Feed JSON ===
Contributors: tabletize
Tags: feed, feeds, json, jsonp, tabletize
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 1.0.0

Expose Wordpress posts to be used by a Tabletize data source.

== Description ==

Expose a new type of feed compatible with a Tabletize data source.
You can point your Tabletize external data source to `http://example.com/feed/json` or `http://example.com/?feed=json` and you get a fully functional Tabletize data source that you can use with a list element.
You can find out more about external data sources here: `http://help.tabletize.com/data/external-source/`.

== Installation ==

1. Upload the entire `tabletize-json` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress.
3. Login your Tabletize.com account.
4. Select your App or create a new one.
5. Add an external data source and point to `http://example.com/?feed=json`.
7. Use your new data source in your App.

== Changelog ==

**1.0.0 August 25, 2015**

Initial release.