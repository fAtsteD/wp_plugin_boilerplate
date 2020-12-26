# WordPress Plugin Boilerplate

The boilerplate is for private using myself.
Some special feature:

- all code in classes
- have namespace
- custom autoloader based on composer uses namespace, name of classes (custom because can be refused folder vendor, some files cannot be autoloaded with plugin)

## Starting using

Rename "PluginName" everywhere in your name of plugin (it uses for namespace, unique path and name).
Rename main file plugin-name.php and const inside.

## Structure

- admin - using in admin pagel and all what you need
- public - all that can be used in site
- languages - standart folder for languages
- include - all addtionals that you need:
  - src - source code that loaded from autoload, main code
    - Core:
      - Activator - class with static method for activate plugin
      - Deactivator - class with static method for deactivate plugin
      - I18n - class for translations module
      - Loader - unified class for adding filters, hooks, maybe other loading for WP
      - App - main class for plugin
    - Site:
      - Main - main class for public
    - Admin:
      - Main - main class for public
  - wp-include - some code that will be loaded in specific time, it is not include in autoload (example: inherited custom class for table in admin panel that loads in special hook in some moment)
