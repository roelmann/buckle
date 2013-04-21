<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Richard Oelmann's standardbs theme, an extension of the Moodle Core standardbs theme which builds on bootstrap as a parent
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 * 
 * @package   Moodle standardbs theme
 * @copyright 2013 Moodle, moodle.org
 * @copyright 2013 Richard Oelmann, editcons.net
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Logo file setting.
    $name = 'theme_standardbs/logo';
    $title = get_string('logo', 'theme_standardbs');
    $description = get_string('logodesc', 'theme_standardbs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_standardbs/customcss';
    $title = get_string('customcss', 'theme_standardbs');
    $description = get_string('customcssdesc', 'theme_standardbs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_standardbs/footnote';
    $title = get_string('footnote', 'theme_standardbs');
    $description = get_string('footnotedesc', 'theme_standardbs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);
}
