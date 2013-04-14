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

function standardbs_process_css($css, $theme) {

    //Get the path to the logo url from settings - 'old' style if filepicker option is not integrated for 2.5
    if (!empty($theme->settings->logo)) {
        $logo = $theme->settings->logo;
    } else {
        $logo = null;
    }
    $css = standardbs_set_logo($css, $logo);
    
    // Set the background image for the logo. For if filepicker option is integrated and used
    //$logo = $theme->setting_file_url('logo', 'logo');
    //$css = standardbs_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = standardbs_set_customcss($css, $customcss);

    return $css;
}

//Use this version if filepicker is used
//function standardbs_set_logo($css, $logo) {
    //global $OUTPUT;
    //$tag = '[[setting:logo]]';
    //$replacement = $logo;
    //if (is_null($replacement)) {
    //    $replacement = '';
    //}

    //$css = str_replace($tag, $replacement, $css);

    //return $css;
//}

//Use this version if 'old' url logo method is used
function standardbs_set_logo($css, $logo) {
    global $OUTPUT;
    $tag = '[[setting:logo]]';
    if (is_null($logo)) {
        $replacement = $OUTPUT->pix_url('logo', 'theme'); //Default image
    }
    else {
        $protocol = '://';
        $ntp = strpos($logo, $protocol); // Check to see if a networking protocol is used
        if($ntp === false) { // No networking protocol used
            $relative = '/';
            $rel = strpos($logo, $relative); // Check to see if a relative path is used
            if($rel !== 0) { // Doesn't start with a slash
                $replacement = $OUTPUT->pix_url("$logo", 'theme'); // Using Moodle output
            } else {
                $replacement = $logo;
            }
        } else {
            $replacement = $logo;
        }
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}


function standardbs_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}
