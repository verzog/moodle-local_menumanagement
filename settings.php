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


defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/lib.php');

if ($hassiteconfig) {
    // New settings page.
    $page = new admin_settingpage('local_menumanagement',
            get_string('pluginname', 'local_menumanagement', null, true));


    if ($ADMIN->fulltree) {
        
        $name = 'local_menumanagement/menulabel';
        $title = new lang_string('menulabel', 'local_menumanagement');
        $description = new lang_string('menulabel_desc', 'local_menumanagement');
        $setting = new admin_setting_configtext($name, $title, $description, 'Menu');
        $page->add($setting);
        
        //$defaultCustomNodes = '{"0":{"id":"8","label":"Home","link":"/my/","adminonly":"0","icon":"fa fa-home"},"1":{"id":"9","label":"My Dashboard","link":"/user/profile.php","adminonly":"0","icon":"fa fa-tachometer"},"2":{"id":"10","label":"Courses","link":"/course/","adminonly":"0","icon":"fa fa-book"},"3":{"id":"11","label":"Calendar","link":"/calendar/view.php?view=month","adminonly":"0","icon":"fa fa-calendar"},"4":{"id":"12","label":"My Certificates","link":"/local/certificates/index.php","adminonly":"0","icon":"fa fa-certificate"},"5":{"id":"13","label":"My Team","link":"/local/learnbook/myteam/","adminonly":"0","icon":"fa fa-users"},"6":{"id":"1","label":"Administration","link":"/","adminonly":"1","icon":"fa fa-list-alt","child":{"0":{"id":"2","label":"Admin Dashboard","link":"/local/admindashboard/","adminonly":0,"icon":""},"1":{"id":"3","label":"Theme","link":"/admin/settings.php?section=themesettingnewlearnbook","adminonly":0,"icon":""},"2":{"id":"4","label":"Advanced features","link":"/admin/settings.php?section=optionalsubsystems","adminonly":0,"icon":""},"3":{"id":"5","label":"Analytics","link":"/local/intelliboard/index.php","adminonly":0,"icon":""},"4":{"id":"6","label":"Reporting","link":"/local/learnbook/report/","adminonly":0,"icon":""}}},"7":{"id":"14","label":"Webinar","link":"/","adminonly":"0","icon":"fa fa-commenting"},"8":{"id":"15","label":"Video Galery","link":"/","adminonly":"0","icon":"fa fa-video-camera"},"9":{"id":"16","label":"Gamificatition","link":"/badges/newbadge.php?type=1","adminonly":"0","icon":"fa fa-gamepad"},"10":{"id":"17","label":"Site Configuration","link":"/admin/search.php","adminonly":"1","icon":"fa fa-cog"}}';
        
        $defaultCustomNodes = '{"0":{"id":"8","label":"Home","link":"/my/","adminonly":"0","icon":"fa fa-home"},"1":{"id":"9","label":"My Dashboard","link":"/user/profile.php","adminonly":"0","icon":"fa fa-tachometer"},"2":{"id":"10","label":"Courses","link":"/course/","adminonly":"0","icon":"fa fa-book"},"3":{"id":"11","label":"Calendar","link":"/calendar/view.php?view=month","adminonly":"0","icon":"fa fa-calendar"},"4":{"id":"18","label":"Menu Management","link":"/local/menumanagement","adminonly":"1","icon":"fa fa-list-alt"},"5":{"id":"17","label":"Site Administration","link":"/admin/search.php","adminonly":"1","icon":"fa fa-cog"}}';
        
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
