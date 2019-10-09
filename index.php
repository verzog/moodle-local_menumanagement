<?php
require('../../config.php');
require_once($CFG->dirroot . '/local/menumanagement/menumanagementmodel.php');
if (!empty($CFG->forceloginforprofiles)) {
	require_login();
	if (isguestuser()) {
		$PAGE->set_context(context_system::instance());
		echo $OUTPUT->header();
		echo $OUTPUT->confirm(get_string('guestcantaccessprofiles', 'error'),
				get_login_url(),
				$CFG->wwwroot);
		echo $OUTPUT->footer();
		die;
	}
} else if (!empty($CFG->forcelogin)) {
	require_login();
}
if (!is_siteadmin($USER)) {
 print_error('accessdenied', 'admin');
}
$PAGE->requires->jquery();
//$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/jquery-1.11.1.js'),true);
$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/jquery.fonticonpicker.min.js'),true);
$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/selectize.js'),true);
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/style.css'));
$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/jquery.nestable.js'),true);
$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/menudash.js'),true);
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/jquery.fonticonpicker.css'));
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/jquery.fonticonpicker.grey.min.css'));
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/font-awesome.css'));
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/selectize.css'));

$PAGE->set_url(new moodle_url("/local/menumanagement/", array()));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Menu Management');
$PAGE->set_heading('Menu Management');
//$PAGE->set_pagetype('trainingreport');
$PAGE->set_pagelayout('base');

//$PAGE->navbar->add('Administration');
//$PAGE->navbar->add('Admin Dashboard', new moodle_url('/local/admindashboard/index.php'));
//$PAGE->navbar->add('Menu Management', new moodle_url('index.php'));

$message = '';
if(isset($_POST) && isset($_POST['menu-items-list']))
{
    $insertcustomnodesusers = str_replace(array('","label":"{"', '"}","link":"'), array('","label":{"', '"},"link":"'), stripslashes($_POST['menu-items-list']));
    set_config('insertcustomnodesusers', $insertcustomnodesusers,'local_menumanagement');
    $message = "Menu items saved successfully.";
    $type = "success";    
}

echo $OUTPUT->header();
?>


<?php
if($message != '')
    \core\notification::add($message, $type);

$userMenuItems = get_config('local_menumanagement','insertcustomnodesusers');
$menuLabel = get_config('local_menumanagement','menulabel');


$menuItems = menumanagement_model::createMenuItemsNew($userMenuItems);
//$menuItems = menumanagement_model::createMenuItems($adminMenuItems);

$totalItems = $menuItems['totalItems'];
unset($menuItems['totalItems']);

$installedlangs = get_string_manager()->get_list_of_translations(true);
$extraLangs = array();
foreach($installedlangs as $key => $lang) {
    if ($key !== 'en') {
        $extraLangs[$key] = $lang;
    }
}
require_once ('templates/index.php');
$PAGE->requires->js_call_amd('local_menumanagement/admin', 'init');
?>
<?php
echo $OUTPUT->footer();

?>
