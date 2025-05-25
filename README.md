# WP Plugin Editor Toggle

**Contributors:** rishadbitcode  
**Tags:** plugin editor, theme editor, security, admin tools, file editor toggle  
**Requires at least:** 5.0  
**Tested up to:** 6.5  
**Requires PHP:** 7.0  
**Stable tag:** 1.0  
**License:** GPLv2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

A simple, no-bloat plugin that adds an **admin menu toggle** to enable or disable the **Plugin and Theme Editor** in WordPress.

---

## 🧠 Description

By default, WordPress allows administrators to edit plugin and theme files directly from the dashboard. While convenient, this can also be a security risk or cause unintended errors.

**WP Plugin Editor Toggle** lets you easily **enable or disable** those editors using a **single button**—no need to touch code or edit `wp-config.php`.

Ideal for:

- 🔒 Securing production environments  
- 👨‍💼 Client handoffs  
- 🧪 Preventing accidental file changes  

---

## 🎯 Features

- ✅ Adds an admin menu item titled **Editor Toggle**
- 🔄 One-click form toggle to disable or enable the Plugin/Theme Editor
- 🔐 When disabled, WordPress's file editors are completely inaccessible
- 🧼 Simple UI — No settings, no configs, just works
- 💡 Uses `DISALLOW_FILE_EDIT` internally, without modifying core files

---

## 🚀 Installation

1. Upload the plugin to the `/wp-content/plugins/` directory.
2. Activate the plugin via the **Plugins** menu in WordPress.
3. Go to **Dashboard > Editor Toggle**.
4. Click **Toggle Editor** to enable or disable access to the built-in editors.

---

## 🖥️ How It Works

This plugin uses WordPress hooks to:

- Add an admin menu item via `add_menu_page()`
- Store the toggle state in the database using `update_option()`
- On `init`, check the state and define `DISALLOW_FILE_EDIT` if needed

### Code Snippet Behind the Scenes

```php
if (get_option('plugin_editor_disabled')) {
    define('DISALLOW_FILE_EDIT', true);
}
