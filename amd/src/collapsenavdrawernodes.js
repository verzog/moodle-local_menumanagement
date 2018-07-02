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


define(['jquery'], function($) {
    "use strict";

    /**
     * Click handler to toggle the given nav node.
     * @param {Object} node The nav node which should be toggled.
     * @param {string} nodename The nav node's nodename.
     */
    function toggleClickHandler(node, nodename) {
        node.click(function(e) {
            // Prevent that the browser opens the node's default action link (if existing).
            e.preventDefault();

            // If the parent node is currently expanded.
            if (node.attr('data-collapse') == 0) {
                // Set the hidden attribute to true for all elements which have the nodename as their data-parent-key attribute.
                $('.list-group-item[data-parent-key=' + nodename + ']').attr("data-hidden", "1");
                // Change the collapse attribute of the node itself to true.
                node.attr("data-collapse", "1");
                // Save this state to the user preferences.
                M.util.set_user_preference('local_menumanagement-collapse_' + nodename + 'node', 1);

                // If the parent node is currently collapsed.
            } else if (node.attr('data-collapse') == 1) {
                // Set the hidden attribute to false for all elements which have the nodename as their data-parent-key attribute.
                $('.list-group-item[data-parent-key=' + nodename + ']').attr("data-hidden", "0");
                // Change the collapse attribute of the node itself to false.
                node.attr("data-collapse", "0");
                // Save this state to the user preferences.
                M.util.set_user_preference('local_menumanagement-collapse_' + nodename + 'node', 0);
            }

             //add click event on left side menu item which has sub menu items when left side menu is collapsed
             if(node.attr('data-isexpandable') == 1)
             {
                if($('#nav-drawer').hasClass('closed'))
                {
                    $('button[aria-controls=nav-drawer]').click();
                }

             }

        });
    }

    /**
     * Init function of this AMD module which initializes the click handlers.
     * @param {string} nodename The nav node's nodename.
     */
    function initToggleNodes(nodename) {
        // Search node to be collapsible.
        var node = $('.list-group-item[data-key="' + nodename + '"]');

        // Add a click handler to this node.
        toggleClickHandler(node, nodename);
    }

    return {
        init: function(params) {
            for (var i = 0, len = params.length; i < len; i++) {
                initToggleNodes(params[i]);
            }

            $('button[aria-controls=nav-drawer]').on( "click", function() {
            //    $('.menu-title').hide('slide', {direction: 'left'}, 1000);

                if(!$('#nav-drawer').hasClass('closed'))
                {
                    $('#nav-drawer.closed .list-group').css('text-align','left');
                    $('.menu-title').fadeOut(250, function(){
                        $('#nav-drawer.closed .list-group').css('text-align','center');
                    });
                }
                else
                {
                    $('#nav-drawer.closed .list-group').css('text-align','left');
                    $('.menu-title').fadeIn(250, function(){
                    });
                }
            });

        }



    };

});
