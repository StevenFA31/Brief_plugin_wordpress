<?php
/**
 * @package Test
 * @version 0.0.7
 */
/*
Plugin Name: Testing
Plugin URI: https://cherry.img.pmdstatic.net/fit/https.3A.2F.2Fimg.2Eohmymag.2Ecom.2Fs3.2Ffromm.2Finsolite.2Fdefault_2019-10-08_cfb50d5a-bb57-4cbc-be5c-bd159070d3a7.2Ejpeg/640x360/quality/80/saviez-vous-que-le-jeu-du-rond-provient-d-une-celebre-serie.jpg
Description: Ceci est un test !
Author: Steven FERREIRA ALVES 
Version: 0.0.7
Author URI: https://stevenfa31.github.io/
*/


add_action('wp_footer', 'articles_shortcode');
// add_filter('default_content','contenu_par_default')
add_shortcode('ListesArticles', 'gererArticleS');
add_shortcode('ListesPages', 'gererPages');
add_shortcode('ListesUsers', 'gererUsers');

function articles_shortcode()
{

    echo ("<h1>hello the world !<h1/>");

}

function gererArticles()
{

    $args = array(
        'numberposts' => 5,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
    );
    $posts = wp_get_recent_posts($args);
    $output = '<table><tr><th>Article Title</th></tr>';
    foreach ($posts as $post) {
        $output .= '<tr><td>' . $post['post_title'] . '</td></tr>';
    }
    $output .= '</table>';
    return $output;

    //     return "Template par defaut 
// LoremqsdQDG ZGEHRRTJTKYULYLIRRRRRRLoremqsdQDG 
// ZGEHRRTJTKYULYLIRRRRRRLoremqsdQDG ZGEHRRTJTKYULYLIRRRRRRLoremqsdQDG
//  ZGEHRRTJTKYULYLIRRRRRRLoremqsdQDG ZGEHRRTJTKYULYLIRRRRRRLoremqsdQDG 
//  ZGEHRRTJTKYULYLIRRRRRRLoremqsdQDG ZGEHRRTJTKYULYLIRRRRRR
// ";

}

function gererPages()
{

    $pages = get_pages();
    $output = '<table><tr><th>Page Title</th></tr>';
    foreach ($pages as $page) {
        $output .= '<tr><td>' . $page->post_title . '</td></tr>';
    }
    $output .= '</table>';
    return $output;

}

function gererUsers()
{

    global $wpdb;
    $users = $wpdb->get_results("SELECT user_login FROM $wpdb->users");
    $output = '<table><tr><th>Username</th></tr>';
    foreach ($users as $user) {
        $output .= '<tr><td>' . $user->user_login . '</td></tr>';
    }
    $output .= '</table>';
    return $output;

}