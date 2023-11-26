=== SD WP-CLI LIST POSTS ===
Contributors: danejshweta
Donate link: https://shwetadanej.com/
Tags: pages, posts, count of posts, authors
Requires at least: 5.8
Tested up to: 6.4
Stable tag: 5.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

This plugin provides a command to display the number of published posts by a specific author or post type. The command name is "author-posts-count", it accepts an optional parameter "--author" or "-a" to specify the author's username. The command also accepts the optional parameter "--post_type" to specify the post type name. The command should output the author's username and the corresponding number of published posts. If no author is specified, the command will display the number of published posts for all authors.

How does this plugin works?

* To use the WP-CLI command, make sure the plugin is activated
* To fire WP-CLI command, open the terminal in your WordPress installation folder and follow below given commands OR you can choose to use these commands in your code and execute them using php functions.

Commands:

    1. [--author=<username>] : Specify the author's username.
    2. [--a=<username>] : Specify the author's username.
    3. [--post_type=<post_type>] : Specify the post type, if not specified default 'post' will be used.


Examples:

    1. wp author-posts-count --author=johndoe --post_type=movie
    2. wp author-posts-count --author=johndoe
    3. wp author-posts-count --a=johndoe --post_type=movie
    4. wp author-posts-count --a=johndoe
    5. wp author-posts-count --post_type=movie
    6. wp author-posts-count


== Installation ==

Prerequisites:

* To install this plugin, you will need to setup wordpress project in your computer.

Uploading within WordPress Dashboard:

    1. Download the zip of this repository.
    2. Navigate to ‘Add New’ within the plugins dashboard.
    3. Navigate to ‘Upload’ area.
    4. Select ‘zip of plugin files’ from your computer.
    5. Click ‘Install Now’.
    6. Activate the plugin within the Plugin dashboard.

Using FTP:

    1. Extract the ‘zip’ directory to your computer.
    2. Upload the plugin directory to the ‘/wp-content/plugins/’ directory.
    3. Activate the plugin from the Plugin dashboard.

== Screenshots ==

1. 
2. 

== Changelog ==

= 1.0 =
* A change since the previous version.