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
 * Local menu management settings page
 *
 * @package    local_menumanagement
 * @copyright  2019 eCreators PTY LTD
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/lib.php');

if ($hassiteconfig) {
    $ADMIN->add('appearance', new admin_externalpage('menumanagement',
        get_string('customise_menumanagement', 'local_menumanagement'),
        new moodle_url('/local/menumanagement/')));
    // New settings page.
    $page = new admin_settingpage('local_menumanagement',
            get_string('node_menumanagement', 'local_menumanagement', null, true));


    if ($ADMIN->fulltree) {

        //$name = 'local_menumanagement/menulabel';
        //$title = new lang_string('menulabel', 'local_menumanagement');
        //$description = new lang_string('menulabel_desc', 'local_menumanagement');
        //$setting = new admin_setting_configtext($name, $title, $description, 'Menu');
        //$page->add($setting);

        $defaultCustomNodes = '{"0":{"id":"8","label":{"en":"Home"},"link":"/my/","adminonly":"0","capability":"","icon":"fa fa-home"},"1":{"id":"9","label":{"en":"My Dashboard"},"link":"/local/profile/","adminonly":"0","capability":"","icon":"fa fa-tachometer"},"2":{"id":"11","label":{"en":"Calendar"},"link":"/calendar/view.php?view=month","adminonly":"0","capability":"","icon":"fa fa-calendar"},"3":{"id":"19","label":{"en":"My Certificates"},"link":"/local/certificates/","adminonly":"0","capability":"","icon":"fa fa-certificate"},"4":{"id":"29","label":{"en":"My Users"},"link":"/admin/search.php","adminonly":"1","capability":"","icon":"fa fa-user-circle-o","child":{"0":{"id":"28","label":{"en":"Create a new user"},"link":"/user/editadvanced.php?id=-1","adminonly":0,"capability":"","icon":"fa fa-user-plus"},"1":{"id":"32","label":{"en":"Browse Users"},"link":"/admin/user.php","adminonly":0,"capability":"","icon":"fa fa-users"},"2":{"id":"30","label":{"en":"Bulk upload users"},"link":"/admin/tool/uploaduser/index.php","adminonly":0,"capability":"","icon":"fa fa-user-plus"},"3":{"id":"31","label":{"en":"Bulk user actions"},"link":"/admin/user/user_bulk.php","adminonly":0,"capability":"","icon":"fa fa-users"}}},"5":{"id":"23","label":{"en":"Administration"},"link":"/","adminonly":"1","capability":"","icon":"fa fa-list-alt","child":{"0":{"id":"25","label":{"en":"Admin Dashboard"},"link":"/local/admindashboard/","adminonly":0,"capability":"","icon":"fa fa-th"},"1":{"id":"17","label":{"en":"Analytics"},"link":"/local/intelliboard/","adminonly":0,"capability":"","icon":"fa fa-bar-chart-o"},"2":{"id":"10","label":{"en":"Courses"},"link":"/course/","adminonly":0,"capability":"","icon":"fa fa-book"},"3":{"id":"33","label":{"en":"Learnbook Reports"},"link":"/local/learnbook/report/","adminonly":0,"capability":"","icon":"fa fa-file-text-o"},"4":{"id":"19","label":{"en":"Menu Management"},"link":"/local/menumanagement/","adminonly":0,"capability":"","icon":"fa fa-list-alt"},"5":{"id":"18","label":{"en":"Site Administration"},"link":"/admin/search.php","adminonly":0,"capability":"","icon":"fa fa-cog"},"6":{"id":"27","label":{"en":"Theme"},"link":"/admin/settings.php?section=themesettinglearnbook","adminonly":0,"capability":"","icon":"fa fa-photo"}}},"6":{"id":"21","label":{"en":"My Teams"},"link":"/local/myteam/","adminonly":"0","capability":"","icon":"fa fa-users"}}';

        // Create insert custom nodes for users widget.
        $page->add(new admin_setting_configtextarea('local_menumanagement/insertcustomnodesusers',
                get_string('setting_insertcustomnodesusers', 'local_menumanagement', null, true),
                get_string('setting_insertcustomnodesusers_desc', 'local_menumanagement', null, true).'<br /><br />'.
                        get_string('setting_customnodesusageusers', 'local_menumanagement', null, true).
                        get_string('setting_customnodesusagechildnodes', 'local_menumanagement', null, true),
                $defaultCustomNodes,
                PARAM_RAW));


    }

    // Add settings page to the appearance settings category.
    $ADMIN->add('appearance', $page);
}
