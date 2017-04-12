<?php

add_action ('init nav menu','setup_navbar');
function setup_navbar(){
    register_nav_menu('navbar-left', __('Main menu (left)', 'bst'));
    register_nav_menu('navbar-right', __('Main menu (right)', 'bst'));
}
