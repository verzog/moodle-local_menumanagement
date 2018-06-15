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

$cssFile = file_get_contents(new moodle_url('/local/menumanagement/assets/css/style.css'));

//[[setting:sectionhovercolor]]
$sectionhovercolor = get_config('theme_newlearnbook','sectionhovercolor');
$customcss = '';
if (!empty($sectionhovercolor)) {
    $customcss = $sectionhovercolor;
}
$tag = '[[setting:sectionhovercolor]]';
$css = str_replace($tag, $customcss, $cssFile);

$PAGE->requires->jquery();
//$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/jquery-1.11.1.js'),true);
$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/jquery.fonticonpicker.min.js'),true);
//$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/style.css'));
$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/jquery.nestable.js'));
$PAGE->requires->js(new moodle_url('/local/menumanagement/assets/js/menudash.js'));
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/jquery.fonticonpicker.css'));
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/jquery.fonticonpicker.grey.min.css'));
$PAGE->requires->css(new moodle_url('/local/menumanagement/assets/css/font-awesome.css'));

$PAGE->set_url(new moodle_url("/local/menumanagement/index.php", array()));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Menu Management');
$PAGE->set_heading('Menu Management');
//$PAGE->set_pagetype('trainingreport');
$PAGE->set_pagelayout('trainingreport');

$PAGE->navbar->add('Administration');
$PAGE->navbar->add('Admin Dashboard', new moodle_url('/local/admindashboard/index.php'));
$PAGE->navbar->add('Menu Management', new moodle_url('index.php'));

$message = '';
if(isset($_POST) && isset($_POST['menu-items-list']))
{
    $insertcustomnodesusers = $_POST['menu-items-list'];
    set_config('insertcustomnodesusers', $insertcustomnodesusers,'local_boostnavigation');
    $message = "Menu items saved successfully.";
    $type = "success";    
}

echo $OUTPUT->header();
?>

<style> <?php echo $css; ?> </style>

<?php
if($message != '')
    \core\notification::add($message, $type);

$sectionHeaderColor = get_config('theme_newlearnbook','sectionheadercolor');
$userMenuItems = get_config('local_boostnavigation','insertcustomnodesusers');
//$adminMenuItems = get_config('local_boostnavigation','insertcustomnodesadmins');


$menuItems = menumanagement_model::createMenuItemsNew($userMenuItems);
//$menuItems = menumanagement_model::createMenuItems($adminMenuItems);

$totalItems = $menuItems['totalItems'];
unset($menuItems['totalItems']);
?>


<div class="container-fluid">
<div class="row">
    
<div class="card" id="user-menu">
            
    <div class="card-header" role="tab" id="heading1" style="background-color: <?php echo $sectionHeaderColor;?>;">
                        
        <!--data-toggle="collapse"  href="#collapse1" -->
        <a style="text-decoration: none;color:white;" class="clickacc" data-parent="#accordion" aria-expanded="true" aria-controls="collapse1">
                <h4 class="mb-0" style="font-weight: 100;margin-top: 7px;">
                <i class="fa fa-list-alt"></i>&nbsp;Learnbook Panel
<!--                <span style="float:right;" class="expandspan down"><i class="fa fa-caret-down" style="font-size: 22px;"></i></span>
                <span style="float:right;" class="expandspan right"><i class="fa fa-caret-right" style="font-size: 22px;"></i></span>-->
                </h4>
                </a>

            </div>    
    
            <div id="collapse1" class="collapse show in" role="tabpanel" aria-labelledby="heading1" style="">    
                <div class="card-block">

<!--<menu id="nestable-menu">
        <button type="button" data-action="expand-all">Expand All</button>
        <button type="button" data-action="collapse-all">Collapse All</button>
</menu>-->
       
    
    <form id="add-item-form" class="form-inline" action="/action_page.php">
        <span class="form-control">
        <label for="label">Label:</label>
        <input type="text" id="label" placeholder="Fill label" required class="form-control input-blank" style="padding: .5rem .75rem !important;margin-top:0 !important;">

        <label for="link">Link:</label>
        <input type="text" id="link" placeholder="Fill link" required class="form-control input-blank">

        <input type="text" id="font-awesome-icon-list" name="font-awesome-icon-list" class="form-control" />

        <div class="form-check form-check-inline">
            <label class="form-check-label input-blank">
              <input type="checkbox" class="" value="" name="adminonly" id="adminonly" style="width: 20px;height: 15px;">Admin Only
            </label>
        </div>
       
        <span class="form-control" style="border:none;padding-left: 0;">
        <button type="button" id="add-item" class="btn btn-success">Add</button>&nbsp;
        <input class="btn reset" type="button" value="Reset" style="background-color: cornflowerblue;border: none;color:white;height: 33px;">      
        </span>
        <input type="hidden" id="id" value ='<?php $totalItems+1;?>'>
        </span>
    </form>        
    
    <div class="cf nestable-lists">                        
        <div class="dd" id="nestable" style="width: 100%;">               
               <?php print menumanagement_model::getMenu($menuItems); ?>            
        </div>       
    </div>
   
    <form id="menu-items" action="" method="POST">
        <input type="hidden" name="menu-items-list" id="nestable-output">   
        <!--<textarea name="menu-items-list" id="nestable-output"> </textarea>-->   
    </form>

    <button type="button" id="save-menu" class="btn btn-success">Submit</button>
    <!--<input type="button" value="Save" id="save-menu">-->
        
    </div>
    </div>
    </div>
    </div>
    
    
</div>

<div id="new-item" style="display:none;">
     <li class="dd-item dd3-item new-item-only" data-adminonly="" data-icon="" data-link="" data-label="" data-id="<?php echo $totalItems+1; ?>">
        <div class="dd-handle dd3-handle"><i class="fa fa-arrows drag-icon" aria-hidden="true"></i></div>
        <div class="dd3-content"><span class="label-text" data-id="<?php echo $totalItems+1; ?>" id="label_show<?php echo $totalItems+1; ?>" data-editable></span> 
            <span class="span-right"><span class="link-text" data-id="<?php echo $totalItems+1; ?>" id="link_show<?php echo $totalItems+1; ?>" data-editable></span> &nbsp;&nbsp; 
                <a class="edit-button" data-id="<?php echo $totalItems+1; ?>" id="<?php echo $totalItems+1; ?>" label="" link="" ><i class="fa fa-pencil"></i></a> &nbsp; 
                <a class="del-button" data-id="<?php echo $totalItems+1; ?>" id="<?php echo $totalItems+1; ?>"><i class="fa fa-trash"></i></a></span> 
        </div>
     </li>
</div>
 
<script>

</script>


<?php


echo $OUTPUT->footer();

?>
