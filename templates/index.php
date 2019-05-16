<div class="row">
<div class="col">
    
<div class="card" id="user-menu">
            
    <div class="card-header sectionheadercolor-class" role="tab" id="heading1">
                        
        <!--data-toggle="collapse"  href="#collapse1" -->
        <a style="text-decoration: none;color:white;" class="clickacc" data-parent="#accordion" aria-expanded="true" aria-controls="collapse1">
                <h4 class="mb-0" style="font-weight: 100;margin-top: 7px;">
                <i class="fa fa-list-alt"></i>&nbsp;<?php echo $menuLabel; ?>
<!--                <span style="float:right;" class="expandspan down"><i class="fa fa-caret-down" style="font-size: 22px;"></i></span>
                <span style="float:right;" class="expandspan right"><i class="fa fa-caret-right" style="font-size: 22px;"></i></span>-->
                </h4>
                </a>

            </div>    
    
            <div id="collapse1" class="collapse show in" role="tabpanel" aria-labelledby="heading1" style="">    
                <div class="card-body">

<!--<menu id="nestable-menu">
        <button type="button" data-action="expand-all">Expand All</button>
        <button type="button" data-action="collapse-all">Collapse All</button>
</menu>-->
       
    
    <form id="add-item-form" class="form-inline" action="/action_page.php">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-xs-12 mt-3">
                    <div class="form-group row">
                        <label class="col-sm-5 col-xs-12 col-form-label" for="label"><?php echo get_string('english_label', 'local_menumanagement'); ?>:</label>
                        <input class="col-sm-7 col-xs-10 mx-3 form-control" type="text" id="label" placeholder="Fill label" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12 mt-3">
                    <div class="form-group row">
                        <label class="col-sm-3 col-xs-12 col-form-label" for="link">Link:</label>
                        <input class="col-sm-9 col-xs-10 mx-3 form-control" type="text" id="link" placeholder="Fill link" required class="form-control">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 mt-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" name="adminonly" id="adminonly">
                        <label class="form-check-label">Admin Only</label>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12 pt-5 mt-3">
                    <?php print menumanagement_model::getAllCapability(); ?>
                </div>
                <div class="col-lg-6 col-xs-12 pt-5 mt-3 ml-3">
                    <div class="row">
                        <input type="text" id="font-awesome-icon-list" name="font-awesome-icon-list" class="form-control" />
                    </div>
                </div> 
            </div>
            <div class = "row multilingual-row" id = "multilingual-row">
                <div class="col-lg-4 col-xs-12 mt-3">
                    <?php if (count($extraLangs) > 0) { ?>
                                <button type="button" id="add-multilingual-row" class="btn btn-success btn-add-multilingual-row"><?php echo get_string('add_multilingual_label', 'local_menumanagement'); ?></button>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-xs-12 mt-3">
                    <button type="button" id="add-item" class="btn btn-success"><?php echo get_string('add_menu_item', 'local_menumanagement'); ?></button>
                </div>
                <div class="col-lg-4 col-xs-12 mt-3">
                    <input class="btn reset" type="button" value="Reset" style="background-color: cornflowerblue;border: none;color:white;">
                </div>
                </div>
            </div>
            <input type="hidden" id="id" value ='<?php $totalItems+1;?>'>
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
    <?php if (count($extraLangs) > 0) {
        echo 'var langs = {';
        foreach($extraLangs as $key => $value) {
            echo $key . ': "' . $value . '",';
        }
        echo '}';
    } ?>
</script>