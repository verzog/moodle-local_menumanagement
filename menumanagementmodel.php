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

// ini_set('memory_limit','1024M');
defined('MOODLE_INTERNAL') ||die();
class menumanagement_model {

//	public static function get

    public static function createMenuItems($menuItems)
    {
        // Make a new array on delimiter "new line".
        $lines = explode("\n", $menuItems);
        $cnt = 0;
        $parentCnt = 0;
        $items = [];

        // Parse node settings.
        foreach ($lines as $line) {

            // Trim setting lines.
            $line = trim($line);

            // Skip empty lines.
            if (strlen($line) == 0) {
                continue;
            }

            // Initialize node variables.
            $nodeurl = null;
            $nodetitle = null;
            $nodevisible = false;
            $nodeischild = false;
            $nodekey = null;

            // Make a new array on delimiter "|".
            $settings = explode('|', $line);

            // Check for the mandatory conditions first.
            // If array contains too less or too many settings, do not proceed and therefore do not create the menu.
            // Furthermore check it at least the first two mandatory params are not an empty string.
            if (count($settings) >= 2 && count($settings) <= 4 && $settings[0] !== '' && $settings[1] !== '') {
                foreach ($settings as $i => $setting) {
                    $setting = trim($setting);
                    if (!empty($setting)) {
                        switch ($i) {
                            // Check for the mandatory first param: title.
                            case 0:
                                // Check if this is a child menu and get the menu title.
                                if (substr($setting, 0, 1) == '-') {
                                    $nodeischild = true;
                                    $nodetitle = substr($setting, 1);
                                } else {
                                    $nodeischild = false;
                                    $nodetitle = $setting;
                                }

                                // Set the menu to be basically visible.
                                $nodevisible = true;

                                break;
                            // Check for the mandatory second param: URL.
                            case 1:
                                // Get the URL.
                                try {
                                    $shortNodeURL = $setting;
                                    $nodeurl = new moodle_url($setting);
                                    $nodevisible = true;
                                } catch (moodle_exception $exception) {
                                    // We're not actually worried about this, we don't want to mess up the navigation
                                    // just for a wrongly entered URL. We just don't create a node in this case.
                                    $nodeurl = null;
                                    $nodevisible = false;
                                }

                                break;
                        }

                        // Support for inheritance of the parent node's visibility to his child notes.
                        if ($nodeischild == false) {
                            // To inherit the parent node's visibility to his child nodes later, we have to remember
                            // this visibility now.
                            $lastparentnodevisible = $nodevisible;
                        } else {
                            // Inherit the parent node's visibility. This overrules the child node's visibility.
                            $nodevisible &= $lastparentnodevisible;
                        }

                    }
                }
            }

            if ($nodevisible) {
                $cnt++;
                // Generate node key.
                $nodekey = $keyprefix.++$nodecount;
                preg_match_all('/{(.*?)}/', $nodetitle, $matches);
                $fontIcon = $matches[1][0];
                $nodetitle = preg_replace( "/{([^:}]*):?([^}]*)}/", "", $nodetitle );

                // If it's a parent node.
                if (!$nodeischild)
                    $parent = 1;
                else
                    $parent = 0;

                $thisRef['parent'] = $parent;
                $thisRef['label'] = $nodetitle;
                $thisRef['link'] = $shortNodeURL;
                $thisRef['icon'] = $fontIcon;
                $thisRef['id'] = $cnt;

               if($parent == 0) {
                    $items[$parentCnt]['child'][] = $thisRef;
               } else {
                    $parentCnt++;
                    $items[$parentCnt] = $thisRef;
               }

            }
        }
        $items['totalItems'] = $cnt;
        return $items;
    }

    public static function getMenu($items,$class = 'dd-list')
    {
        $id = "menu-id";
        if($class == 'child')
            $id = '';
        $html = "<ol class=\"".$class." dd3-list\" id='".$id."'>";
        //$html = "<ol class=\"".$class."\" id=\"menu-id\">";

        foreach($items as $key=>$value) {

//            if($value['icon'] != NULL && $value['icon'] != '')
//                $value['icon'] = "fa ".$value['icon'];
            $dataLabel = isset($value['data-label']) ? $value['data-label'] : $value['label'];
            $html.= '<li class="dd-item dd3-item" data-adminonly="'.$value['adminonly'].'" data-capability="'.$value['capability'].'" data-icon="'.$value['icon'].'" data-link="'.$value['link'].'" data-label="'. $dataLabel .'" data-id="'.$value['id'].'" >
                        <div class="dd-handle dd3-handle"><i class="fa fa-arrows drag-icon" aria-hidden="true"></i></div>
                        <div class="dd3-content"><span class="label-text" data-id="'.$value['id'].'" id="label_show'.$value['id'].'" data-editable><i class="fa '.$value['icon'].'" style="font-size:15px;"></i>&nbsp;'.$value['label'].'</span> 
                            <span class="span-right"><span class="link-text" data-id="'.$value['id'].'" id="link_show'.$value['id'].'" data-editable>'.$value['link'].'</span> &nbsp;&nbsp; 
                                <a class="edit-button" data-id="'.$value['id'].'" id="'.$value['id'].'" label="'.$value['label'].'" link="'.$value['link'].'" ><i class="fa fa-pencil"></i></a> &nbsp; 
                                <a class="del-button" data-id="'.$value['id'].'" id="'.$value['id'].'"><i class="fa fa-trash"></i></a></span> 
                        </div>';
            if(array_key_exists('child',$value)) {
                $html .= menumanagement_model::getMenu($value['child'],'dd-list');
            }
                $html .= "</li>";
        }
        $html .= "</ol>";

        return $html;

    }


    public static function createMenuItemsNew($menuItems)
    {
        $menuItems = (array)json_decode($menuItems);

        // Initialize counter which is later used for the node IDs.
        $nodecount = 0;
        $keyprefix = "localmenumanagementcustomrootusers";
        $items = array();
        $parentCnt = 0;

        if(!empty($menuItems))
        {

            foreach($menuItems as $menuItem)
            {
                // Initialize node variables.
                $nodeurl = null;
                $nodetitle = null;
                $nodevisible = false;
                $nodeischild = false;
                $nodekey = null;
                $fontIcon = null;
                $capability = null;

                if(isset($menuItem->label))
                {
                    if (is_object($menuItem->label)) {
                        if (isset($menuItem->label->{current_language()})) {
                            $nodetitle = $menuItem->label->{current_language()};
                        } else {
                            $nodetitle = $menuItem->label->en;
                        }
                        $nodeDataLabel = htmlspecialchars(json_encode($menuItem->label));
                    } else {
                        $nodetitle = $menuItem->label;
                        $nodeDataLabel = $menuItem->label;
                    }
                    $nodevisible = true;
                    $nodeurl = $menuItem->link;
                    $fontIcon = $menuItem->icon;
                    $adminonly = $menuItem->adminonly;
                    $capability = $menuItem->capability;
                }


                if($nodevisible)
                {

                    $parentItem['parent'] = 1;
                    $parentItem['label'] = $nodetitle;
                    $parentItem['data-label'] = $nodeDataLabel;
                    $parentItem['link'] = $nodeurl;
                    $parentItem['icon'] = $fontIcon;
                    $parentItem['adminonly'] = $adminonly;
                    $parentItem['capability'] = $capability;
                    $parentItem['id'] = $menuItem->id;

                    // Generate node key.
                    $nodekey = $keyprefix.++$nodecount;

                    $items[$parentCnt] = $parentItem;

                    if(isset($menuItem->child))
                    {
                        $childItems = (array)$menuItem->child;

                        foreach($childItems as $childItem)
                        {
                            $childItem = (array) $childItem;
                            $childItem['parent'] = 0;

                            if (is_object($childItem['label'])) {
                                if (isset($childItem['label']->{current_language()})) {
                                    $childnodetitle = $childItem['label']->{current_language()};
                                } else {
                                    $childnodetitle = $childItem['label']->en;
                                }
                                $childnodeDataLabel = htmlspecialchars(json_encode($childItem['label']));
                            } else {
                                $childnodetitle = $childItem['label'];
                                $childnodeDataLabel = $childItem['label'];
                            }

                            $childItem['label'] = $childnodetitle;
                            $childItem['data-label'] = $childnodeDataLabel;

                            $items[$parentCnt]['child'][] = (array)$childItem;
                            $nodecount++;
                        }
                    }

                    $parentCnt++;

                }
            }
        }

        $items['totalItems'] = $nodecount;
        return $items;


    }

    public static function getAllCapability(){
        global $DB;
        $capabilities = $DB->get_records_sql("SELECT * FROM mdl_capabilities");
        $selection = "<select name='capability' id='capability_selection' class=''>";
        $selection .= "<option value=''>Role Capability</option>";
        foreach($capabilities as $capability){
            if (self::checkCapabilityString($capability->name)) {
                $capdes = $capability->component.":".get_capability_string($capability->name);
                $selection .= "<option value='{$capability->name}'>{$capdes}</option>";
            }
        }
        $selection .="</select>";
        return $selection;
    }

    public static function checkCapabilityString($capabilityname) {
        // Hack to get rid of irritating menu management index page errors.
        list($type, $name, $capname) = preg_split('|[/:]|', $capabilityname);

        if ($type === 'moodle') {
            $component = 'core_role';
        } else if ($type === 'quizreport') {
            $component = 'quiz_'.$name;
        } else {
            $component = $type.'_'.$name;
        }

        $stringname = $name.':'.$capname;

        if ($component === 'core_role' or get_string_manager()->string_exists($stringname, $component)) {
            return true;
        }

        $dir = core_component::get_component_directory($component);
        if (!file_exists($dir)) {
            return false;
        }
        return false;
    }
}
