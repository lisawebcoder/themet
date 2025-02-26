<?php


/*
Theme Name: aiclassy
Theme URI: http://aiosclassthemes.com/
Description: <%- pkg.description %>
Version: <%- pkg.version %>
Author: <%- pkg.author %>
Author URI: http://aiosclassthemes.com/
Widgets:  header, footer
Theme update URI: 
*/

    function aiclassy_theme_info() {
        return array(
             'name'        => 'aiclassy'
            ,'version'     => '<%- pkg.version %>'
            ,'description' => '<%- pkg.description %>'
            ,'author_name' => '<%- pkg.author %>'
            ,'author_url'  => 'http://aiosclassthemes.com/'
            ,'locations'   => array()
        );
    }

?>
