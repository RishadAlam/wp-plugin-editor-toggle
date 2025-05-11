<?php
/**
 * Plugin Name: WP Plugin Editor Toggle
 * Description: Adds a toggle in the admin menu to enable/disable the Plugin and Theme Editor.
 * Version: 1.0
 * Author: Rishad Alam
 */

add_action('admin_menu', function() {
    add_menu_page(
        'Editor Toggle',
        'Editor Toggle',
        'manage_options',
        'editor-toggle',
        'plugin_editor_toggle_page',
        'dashicons-admin-tools',
        80
    );
});

function plugin_editor_toggle_page() {
    if (!current_user_can('manage_options')) return;

    if (isset($_POST['toggle_editor'])) {
        $status = get_option('plugin_editor_disabled') ? false : true;
        update_option('plugin_editor_disabled', $status);
    }

    $editor_disabled = get_option('plugin_editor_disabled');

    echo '<div class="wrap"><h2>Plugin/Theme Editor Toggle</h2>';
    echo '<form method="post">';
    echo '<p>Current status: <strong>' . ($editor_disabled ? 'Disabled' : 'Enabled') . '</strong></p>';
    echo '<input type="submit" name="toggle_editor" class="button button-primary" value="Toggle Editor">';
    echo '</form></div>';
}

add_action('init', function() {
    if (get_option('plugin_editor_disabled')) {
        define('DISALLOW_FILE_EDIT', true);
    }
});

