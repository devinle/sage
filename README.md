# [Sage Fork](https://github.com/devinle/sage)

A fork of Roots/Sage to work as a submodule within our Wordpress Starter kit. Original repo is set as Upstream and can be sync'd back if necessary.

* Removed all SCSS files except for a main and common/buttons starter (required to have some KSS commenting so included to bootstrap project)
* Removed all bootstrap references in JS and Styles
* Added new cleanup file to remove extra unwanted wordpress markup from output templates (web/app/themes/sage/lib/cleanup.php)
* Added new editor file to add extra TinyMCE custom capabilities - commented out for now (web/app/themes/sage/lib/editor.php)
* Added KSS webpack plugin for living styleguide
* Added submodule for KSS workflow called ed-kss-template
* Removed jQuery

# [See original Sage for more details](https://roots.io/sage/)


## [Sage > ED KSS Template Submodule](https://dleggett@bitbucket.org/enginedigital/ed-kss-template.git)

Soon to be custom KSS template built into the Sage WP theme webpack workflow.

* Added webpack plugin dependency for live stylesheets.
