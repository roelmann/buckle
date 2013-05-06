buckle
==========

A basic theme using the moodle_bootstrapbase as a parent. It is aimed as a starting point for those who would like to
adopt bootstrap as a parent theme, but want to start from a look/layout which is more familiar as a design choice.
It is not designed to be a finished theme for production use, but a theme to be a starting point for building on.

This theme takes the master bootstrapbase theme from core as its parent and then replaces the layout with Danny Wahl's 
Antioch layout (http://iyware.com/portfolio/antioch/) which uses Matthew James' Taylor's Holy Grail 3 column layout
(http://matthewjamestaylor.com/blog/ultimate-multi-column-liquid-layouts-em-and-pixel-widths) with @media calls for 
responsive behaviour.

It adjusts the default bootstrapbase layout to replace the traditional header area with the custom menu below allowing
the familiar branding rather than the small logo within the fixed custom menu. It also replaces the login info to
the right of that header along with the language menu, removing these from the custommenu bar.

In the main body of the page, the buckle theme replaces the default icons, many of which are hidden by the default
bootstrapbase theme.

Additional settings are kept to a minimum in this theme (logo, customcss and footnote) although it is anticipated
that themes built on this will utilise settings to a great effect in customising bootstrapbase in future

The theme provides several css files
* reset.css - which contains specific overrides for the parent css
* pagelayout.css - the responsive 3column HolyGrail layout css
* dock.css - the css required for the dock
* core.css - the theme specific css
* custom.css - the final css file which applies the settings from the customcss setting box

Credits:
========
Moodle_buckle
* author Richard Oelmann http://editcons.net
It is fully acknowledged that this theme would not be possible without the work done by others - see below

Moodle_bootstrapbase (parent theme)
* authors   Bas Brands, David Scotson www.sonsbeekmedia.nl
created with the help of:
Stuart Lamour, Mark Aberdour, Paul Hibbitts, Mary Evans

Antioch (layout)
* author Danny Wahl http://iyware.com
based on the Holy Grail layout work by Matthew James Taylor http://matthewjamestaylor.com/

Moodle_Clean (foundation theme - used as a starting point to clone and create this theme)
* author Mary Evans 
