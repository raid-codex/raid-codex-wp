<?php

/**
* Plugin Name: Raid Codex
* Plugin URI: https://github.com/raid-codex/raid-codex-wp/
* Description: Raid Codex tools
* Version: 1.0
* Author: Geoffrey Bauduin
* Author URI: https://github.com/geoffreybauduin
*/

function raid_codex_champion_page($atts) {
    $atts = shortcode_atts(
        array(
            slug => "",
        ), $atts, "raid-codex-champion-page"
    );
    if (!$atts['slug'] || $atts['slug'] === "") {
        return "No champion found";
    }
    $html = "";
    $file_content = file_get_contents($_SERVER['DOCUMENT_ROOT']."/generated/champions/".$atts['slug'].".html");
    if ($file_content === FALSE) {
        return "";
    }
    $html .= $file_content;
    return $html;
}

add_shortcode('raid-codex-champion-page', 'raid_codex_champion_page');


?>