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
 * This module is compatible with core/form-autocomplete.
 *
 * @package    local_menumanagement
 * @copyright  2019 eCreators
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery', 'core/ajax', 'core/notification', 'core/str'], function($, Ajax, Notification, str) {

    var rowCounter = 0;
    var extraLangsCount = 0;

    $("#add-item").click(function(){
        var label = $("#label").val(),
            link = $("#link").val(),
            id = $("#id").val(),
            capability = $("#capability_selection").val(),
            adminonly = 0,
            dataLabel = {},
            valid = true;

        dataLabel.en = label;

        $('.multilingual-label').each(function() {
            var id = $(this).data('id');
            var lang = $('.multilingual-select[data-id="' + id + '"]').val();
            var langLabel = $('.multilingual-label[data-id="' + id + '"]').val();
            if (lang === undefined || !lang.length) {
                alert('Please select language');
                valid = false;
                return false;
            }
            if (langLabel === undefined || !langLabel.length) {
                alert('Please input multilingual label');
                valid = false;
                return false;
            }
            dataLabel[lang] = langLabel;
        });

        if (!valid) {
            return false;
        }

        if($("#adminonly").is(':checked'))
            adminonly = 1;


        if($("li[data-id='" + id +"']").length > 0) //edit
        {
            $(".label-text[data-id='"+id+"']").text(label);
            $(".link-text[data-id='"+id+"']").text(link);
            $("li[data-id='" + id +"']").attr('data-label', JSON.stringify(dataLabel));
            $("li[data-id='" + id +"']").attr('data-link',link);
            $("li[data-id='" + id +"']").attr('data-adminonly',adminonly);
            $("li[data-id='" + id +"']").attr('data-capability',capability);
            //get selected icon
            var iconClass = $(".selected-icon i").attr('class');
            if(iconClass)
            {
                $("li[data-id='" + id +"']").attr('data-icon',iconClass);
                $(".label-text[data-id='"+id+"']").html("<i class='"+iconClass+"' style='font-size:15px;'></i>&nbsp;"+label);
            }

            $("#label").val('');
            $("#link").val('');
            $("#id").val('');
            $("#add-item").text('Add');
            $(".selected-icon i").attr('class','fip-icon-block');
            $('#capability_selection')[0].selectize.setValue('');
            $('#adminonly').prop('checked', false);
        }
        else
        {
            if(label == '')
            {
                alert('Please input menu item label');
                return false;
            }

            if(link == '')
            {
                alert('Please input menu item link');
                return false;
            }

            //get the max id from li list
            var ids = [];
            $('.dd-item').each(function(i) {
                ids.push($(this).attr('data-id'));
            });

            var newID = Math.max.apply(null, ids) + 1;

            $('#new-item .dd-item').attr('data-id',newID);
            $('#new-item .dd-item').attr('data-link',link);
            $('#new-item .dd-item').attr('data-label', JSON.stringify(dataLabel));
            $('#new-item .dd-item').attr('data-adminonly',adminonly);
            $('#new-item .dd-item').attr('data-capability',capability);

            //get selected icon
            var iconClass = $(".selected-icon i").attr('class');
            $('#new-item .dd-item').attr('data-icon',iconClass);

            if(iconClass)
                $('#new-item .label-text').html("<i class='"+iconClass+"' style='font-size:15px;'></i>&nbsp;"+label);
            else
                $('#new-item .label-text').text(label);


            $('#new-item .link-text').text(link);

            $('#new-item .label-text').attr('data-id',newID);
            $('#new-item .link-text').attr('data-id',newID);
            $('#new-item .edit-button').attr('data-id',newID);
            $('#new-item .edit-button').attr('id',newID);
            $('#new-item .del-button').attr('data-id',newID);
            $('#new-item .del-button').attr('id',newID);

            var itemHTML = $('#new-item').html();
            var itemHTML = itemHTML.replace('new-item-only','');
            $("#menu-id").append(itemHTML);

            //increament id for next new item
            var id = $('#new-item .dd-item').attr('data-id');
            id++;
            $('#new-item .dd-item').attr('data-id',id);
            $('#new-item .label-text').attr('data-id',id);
            $('#new-item .link-text').attr('data-id',id);
            $('#new-item .edit-button').attr('data-id',id);
            $('#new-item .del-button').attr('data-id',id);


            $("#label").val('');
            $("#link").val('');
            $("#id").val('');
            $("#add-item").text('Add');
            $(".selected-icon i").attr('class','fip-icon-block');
            $('#capability_selection')[0].selectize.setValue('');
            $('#adminonly').prop('checked', false);

        }

    });

    $('#add-multilingual-row').click(function() {
        admin.addMultilingualRow(null, null);
    });

    $('.edit-button').click(function() {
        var id = $(this).attr('data-id');
        var label = $(".label-text[data-id='"+id+"']").text();
        var link = $(".link-text[data-id='"+id+"']").text();
        var li = $("li[data-id='" + id +"']");
        var icon = li.attr('data-icon');
        var adminonly = li.attr('data-adminonly');
        var capability = li.attr('data-capability');
        $('.multilingual-row-inputs').remove();
        rowCounter = 1;
        try {
            var jsonLabel = JSON.parse(li.attr('data-label'));
            for (var langCode in jsonLabel) {
                if (langCode !== 'en') {
                    admin.addMultilingualRow(langCode, jsonLabel[langCode]);
                }
                if (Object.keys(jsonLabel).length - 1 > extraLangsCount) {
                    $('#multilingual-row').show();
                }
            }
        } catch(e) {
            if (extraLangsCount > 0) {
                $('#multilingual-row').show();
            }
        }
        //if adminonly item is dragged in any child item then we should unset adminonly check box
        var parent = li.parent();
        if(!parent.is('#menu-id'))
            adminonly = 0;

        label = label.replace('&nbsp;','');
        label = label.trim();

        $("#id").val(id);
        $("#label").val(label);
        $("#link").val(link);
        $(".selected-icon i").attr('class',icon);

        if(adminonly == 1){
            $('#adminonly').prop('checked', true);
        }else{
            $('#adminonly').prop('checked', false);
        }

        $('#capability_selection')[0].selectize.setValue(capability);

        $("#add-item").text('Update');

        $("#label").focus();
        $(window).scrollTop($('#label').position().top);
    });

    $('.reset').click(function() {
        admin.reset();
    });

    var admin = {

        init: function() {
            rowCounter ++;
            extraLangsCount = Object.keys(langs).length;
        },

        addMultilingualRow: function(code, label) {
            str.get_strings([
                { key: 'label', component: 'local_menumanagement' },
                { key: 'multilingual_label', component: 'local_menumanagement' },
                { key: 'select', component: 'local_menumanagement' },
            ]).then(function(strs) {
                var options = [];
                options.push('<option value = "">' + strs[2] + '</option>');

                for(var key in langs) {
                    var option = '<option value = "' + key + '"';
                    if (code === key) {
                        option += ' selected';
                    }
                    option += '>' + langs[key] + '</option>';
                    options.push(option);
                }

                var textInput = '<input type="text" id="label-' + rowCounter + '" data-id = "' + rowCounter + '" placeholder="' + strs[1] + '" class="form-control input-blank multilingual-label"';
                if (label !== null) {
                    textInput += ' value = "' + label + '"';
                }
                textInput += '>';
                $('#multilingual-row').before(
                    '<div class = "row multilingual-row-inputs">' +
                        '<label for="label">' + strs[0] + ':</label>' +
                        textInput +
                        '<select name = "language-' + rowCounter + '" data-id = "' + rowCounter + '" id = "language-' + rowCounter + '" class = "multilingual-select">' + options + '</select>' +
                    '</div>'
                );

                if (rowCounter >= extraLangsCount) {
                    $('#multilingual-row').hide();
                } else {
                    $('#multilingual-row').show();
                }

                rowCounter ++;
            })
        },

        reset: function() {
            $("#label").val('');
            $("#link").val('');
            $("#id").val('');
            $("#add-item").text('Add');
            $(".selected-icon i").attr('class','fip-icon-block');
            $('#capability_selection')[0].selectize.setValue('');
            $('#adminonly').prop('checked', false);
            $('.multilingual-row-inputs').remove();
            rowCounter = 1;
            if (extraLangsCount > 0) {
                $('#multilingual-row').show();
            }
        }
    };

    return admin;
});