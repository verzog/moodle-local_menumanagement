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
 * Local menu management navigation extension
 *
 * @package    local_menumanagement
 * @copyright  2019 eCreators PTY LTD
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade steps for this plugin
 * @param int $oldversion the version we are upgrading from
 * @return boolean
 */
function xmldb_local_menumanagement_upgrade($oldversion) {
    if ($oldversion < 2017050502) {
        global $CFG;

        // Currentcoursefullname setting was removed from this plugin.
        // If it was set and we have the Moodle version which uses $CFG->navshowfullcoursenames to control the nav drawer,
        // set $CFG->navshowfullcoursenames in Moodle core to achieve the same goal.
        if (get_config('local_menumanagement', 'currentcoursefullname') == true && $CFG->version >= 2016120500.03) {
            unset_config('currentcoursefullname', 'local_menumanagement');
            set_config('navshowfullcoursenames', 1);
        }

        upgrade_plugin_savepoint(true, 2017050502, 'local', 'boostnavigation');
    }

    if ($oldversion < 2017051000) {
        // If Moodle is configured with 'Default home page for users' = User preference,
        // the plugin's 'Remove second "Home" or "Dashboard" node' setting didn't have any effect.
        // Remove the wrong setting and set it correctly.
        if (get_config('local_menumanagement', 'removesecondhomenode') == true) {
            unset_config('removesecondhomenode', 'local_menumanagement');
            set_config('removehomenode', 1, 'local_menumanagement');
        }

        upgrade_plugin_savepoint(true, 2017051000, 'local', 'boostnavigation');
    }

    return true;
}
