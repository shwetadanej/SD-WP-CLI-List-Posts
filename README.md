# SD-WP-CLI-List-Posts

### Introduction

This plugin provides a command to display the number of published posts by a specific author or post type. The command name is "author-posts-count", it accepts an optional parameter "--author" or "-a" to specify the author's username. The command also accepts the optional parameter "--post_type" to specify the post type name. The command should output the author's username and the corresponding number of published posts. If no author is specified, the command will display the number of published posts for all authors.


### Prerequisites

- WordPress installtion on the server or in your system
- WP CLI installtion on the server or in your system

### Installation

> **Uploading within WordPress Dashboard**

```
    1. Download the zip of this repository.
    2. Navigate to ‘Add New’ within the plugins dashboard.
    3. Navigate to ‘Upload’ area.
    4. Select ‘zip of plugin files’ from your computer.
    5. Click ‘Install Now’.
    6. Activate the plugin within the Plugin dashboard.
```


### How does this plugin works?

 * To use the WP-CLI command, make sure the plugin is activated.
 * To fire WP-CLI command, open the terminal in WordPress installation folder, follow below given commands OR you can choose to use these commands in your code and execute them using php functions.


### Commands

    1. [--author=<username>] : Specify the author's username.
    2. [--a=<username>] : Specify the author's username.
    3. [--post_type=<post_type>] : Specify the post type, if not specified default 'post' will be used.


### Examples

    1. wp author-posts-count --author=johndoe --post_type=movie
    2. wp author-posts-count --author=johndoe
    3. wp author-posts-count --a=johndoe --post_type=movie
    4. wp author-posts-count --a=johndoe
    5. wp author-posts-count --post_type=movie
    6. wp author-posts-count

### Coding Standards

- Library Used: [WordPress Coding Standard](https://github.com/WordPress/WordPress-Coding-Standards)
- Coding Standard: Php Code Sniffer


### Demo

Login into the [Demo website](https://demo.shwetadanej.com/wp-admin/) using username "demo" and password "demo" to see the working example.
