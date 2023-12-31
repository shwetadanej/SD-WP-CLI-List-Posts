<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://shwetadanej.com
 * @since      1.0.0
 *
 * @package    Sd_Wpcli_List_Posts
 * @subpackage Sd_Wpcli_List_Posts/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

    <h1><?php esc_html_e('WP CLI POST LIST', 'sd-wpcli-list-posts') ?></h1>

    <h3><?php esc_html_e('How does this plugin works?', 'sd-wpcli-list-posts') ?></h3>

    <p><?php esc_html_e('To fire WP-CLI command, open the terminal in your system and follow below given commands OR you can choose to use these commands in your code and execute them using php functions.', 'sd-wpcli-list-posts') ?></p>

    <h3><?php esc_html_e('Commands:', 'sd-wpcli-list-posts') ?></h3>

    <ol>
        <li>[--author=<username>] : <?php esc_html_e("Specify the author's username.", 'sd-wpcli-list-posts') ?></li>
        <li>[--a=<username>] : <?php esc_html_e("Specify the author's username.", 'sd-wpcli-list-posts') ?></li>
        <li>[--post_type=<post_type>] : <?php esc_html_e("Specify the post type, if not specified default 'post' will be used.", 'sd-wpcli-list-posts') ?></li>
    </ol>

    <h3><?php esc_html_e('Examples:', 'sd-wpcli-list-posts') ?></h3>

    <ul>
        <li>wp author-posts-count --author=johndoe --post_type=movie</li>
        <li>wp author-posts-count --author=johndoe</li>
        <li>wp author-posts-count --a=johndoe --post_type=movie</li>
        <li>wp author-posts-count --a=johndoe</li>
        <li>wp author-posts-count --post_type=movie</li>
        <li>wp author-posts-count</li>
    </ul>

    <h3><?php esc_html_e('Disclaimer:', 'sd-wpcli-list-posts') ?></h3>

    <p><?php esc_html_e('The output is displayed using the shell_exec() function; if no output is seen, there may be a server configuration issue or  shell_exec() can be disabled at server level. Use the wp cli command on your command line interface for more accurate results.', 'sd-wpcli-list-posts'); ?></p>

    <h3><?php esc_html_e('Try a demo here:', 'sd-wpcli-list-posts') ?></h3>

    <p><?php esc_html_e('Enter command parameters to see the result', 'sd-wpcli-list-posts'); ?></p>

    <form name="frm_wp_cli_command" class="frm_wp_cli_command" action="" method="post">
        <input type="hidden" name="action" value="sd_cli_command_execute">
        <?php wp_nonce_field('sd_cli_command_execute_action', 'sd_cli_command_execute_nonce'); ?>
        <table class="form-table wp-list-table widefat fixed striped table-view-list posts">
            <tbody>
                <tr>
                    <td>
                        <strong>wp author-posts-count</strong>    
                    </td>
                    <td><input type="text" name="sd_cli_command_author" class="sd-cli-command-author" placeholder="--a OR --author" value="" /></td>
                    <td><input type="text" name="sd_cli_command_post_type" class="sd-cli-command-post_type" placeholder="--post_type" value="" /></td>
                    <td><button type="button" name="sd_cli_command_submit" class="button button-primary wp-cli-command-submit"><?php esc_html_e('Execute', 'sd-wpcli-list-posts') ?></button></td>
                </tr>
            </tbody>
        </table>
        <div class="sd-wp-cli-command-output">

        </div>
    </form>
</div>
