<?php

wp_head();
?>

<!DOCTYPE html>
<html lang="<? bloginfo('language')?>">

<head>
    <meta charset="<? bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <? echo get_bloginfo('name') . " | " . get_bloginfo('description');?>
    </title>
</head>

<body <? body_class()?>>
    <header class="header width-100" id="site-header">
        <div class="header__container container-fluid gx-5">
            <a href="<? esc_url(site_url())?>" class="header__logo" aria-label="to Home Page">
                <h1 style="display:none">
                    <? echo bloginfo('name'); ?>
                </h1>
                <figure class="logo-image">
                    <img src="<? echo get_site_url(null,'/wp-content/uploads/2022/03/logo_full-e1648519596903.png'); ?>" alt="Macros by Sara Logo" class="header__logo--image">
                </figure>
            </a>
            <? wp_nav_menu(
                array(
                    'theme-location'=>'primary_menu',
                    'menu_class'=>'navbar__menu ',
                    'container'=>'nav',
                    'container_class'=>'navbar',
                ));
                ?>
        </div>
    </header>