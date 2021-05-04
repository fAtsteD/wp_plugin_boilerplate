# WordPress Plugin Boilerplate

The boilerplate is for private using myself.
Some special feature:

-   all code in classes
-   have namespace
-   custom autoloader based on composer uses namespace, name of classes (custom because can be refused folder vendor, some files cannot be autoloaded with plugin)

## Starting using

Rename some words everywhere in your name of plugin (it uses for namespace, unique path and name).
Type of renaming

-   Boilerplate -> something camelcase, first letter uppercase
-   boilerplate -> name of main file in plugin and has to be in the App class constant

Run command for generating autoload classes:

```bash
composer dump-autoload --optimize
```

## Structure

-   admin - using in admin pagel and all what you need
-   public - all that can be used in site
-   languages - standart folder for languages
-   include - all addtionals that you need:
    -   src - source code that loaded from autoload, main code
        -   Core:
            -   Activator - class with static method for activate plugin
            -   Deactivator - class with static method for deactivate plugin
            -   I18n - class for translations module
            -   Loader - unified class for adding filters, hooks, maybe other loading for WP
            -   App - main class for plugin
        -   Site:
            -   Main - main class for public
        -   Admin:
            -   Main - main class for public
    -   wp-include - some code that will be loaded in specific time, it is not include in autoload (example: inherited custom class for table in admin panel that loads in special hook in some moment)

## Settings

Settings can be saved in the WP standart function (SettingsWP) or with creating addition table in db (SettingsDB).
You can create any additional settings type from abstract.

Page for editing them from any page from template. Create pages through classes in the Admin namespace with extends abstract class and add them to the factory.

Elements for settings page can be expanded by using interface and existing abstract classes.
