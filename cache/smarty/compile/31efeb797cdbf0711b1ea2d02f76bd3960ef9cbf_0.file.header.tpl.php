<?php
/* Smarty version 3.1.30, created on 2022-11-13 12:11:44
  from "C:\wamp64\www\skeleton\mvc\front\view\theme\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6370fb200b77c5_08034514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31efeb797cdbf0711b1ea2d02f76bd3960ef9cbf' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\front\\view\\theme\\header.tpl',
      1 => 1668348576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:dynamic-css.tpl' => 1,
    'file:javascript.tpl' => 1,
    'file:components/menu.tpl' => 1,
    'file:components/load.tpl' => 1,
  ),
),false)) {
function content_6370fb200b77c5_08034514 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang=”pt-br”>
    <head>
        <meta charset="utf-8">
        <title><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
</title>
        <link rel="preconnect" href="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <link rel="dns-prefetch" href="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <link rel="alternative" lang="pt-br" href="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="language" content="pt-br" />
        <?php if ($_smarty_tpl->tpl_vars['colors']->value->getValue('enabled_meta_color')) {?>
        <meta name="theme-color" content="<?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('meta_color');?>
">
        <meta name="msapplication-navbutton-color" content="<?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('meta_color');?>
">
        <meta name="msapplication-TileColor" content="<?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('meta_color');?>
">
        <?php }?>
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('name');?>
" />
        <meta name="copyright" content="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('name');?>
" />
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
        <meta name="subject" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
        <meta name="abstract" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
        <meta name="comment" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
        <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['meta_keywords']->value;?>
">
        <meta name="rating" content="General" />
        <meta name="robots" content="index, follow" />
        <link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <meta itemprop="name" content="<?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
" />
        <meta itemprop="description" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
        <meta itemprop="image" content="<?php if (isset($_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value) && $_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value != '') {
echo $_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value;
} else {
echo $_smarty_tpl->tpl_vars['logo_desktop']->value;
}?>" />
        <meta itemprop="url" content="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
" />
        <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
        <meta property="og:image" content="<?php if (isset($_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value) && $_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value != '') {
echo $_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value;
} else {
echo $_smarty_tpl->tpl_vars['logo_desktop']->value;
}?>" />
        <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('name');?>
" />
        <meta property="og:locale" content="pt_BR" />
        <meta property="twitter:domain" content="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <meta property="twitter:title" content="<?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
" />
        <meta property="twitter:description" content="<?php echo $_smarty_tpl->tpl_vars['meta_description']->value;?>
" />
        <meta property="twitter:image" content="<?php if (isset($_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value) && $_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value != '') {
echo $_smarty_tpl->tpl_vars['og_imagem_thumbnail']->value;
} else {
echo $_smarty_tpl->tpl_vars['logo_desktop']->value;
}?>" />
        <meta property="twitter:url" content="<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
" />
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['icon_16']->value;?>
" sizes="16x16">
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['icon_32']->value;?>
" sizes="32x32">
        <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['icon_96']->value;?>
" sizes="96x96">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_57']->value;?>
">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_60']->value;?>
">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_72']->value;?>
">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_76']->value;?>
">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_114']->value;?>
">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_120']->value;?>
">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_144']->value;?>
">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $_smarty_tpl->tpl_vars['apple_icon_152']->value;?>
">
        <meta name="msapplication-TileImage" content="<?php echo $_smarty_tpl->tpl_vars['ms_icon_32']->value;?>
">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <?php if (isset($_smarty_tpl->tpl_vars['media']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['media']->value['CSS'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['enabled']) {?>
                    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
" type="text/css" />
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
        <?php $_smarty_tpl->_subTemplateRender("file:dynamic-css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                         
        <?php if ($_smarty_tpl->tpl_vars['move_js_to_finish']->value == false) {?>
            <?php $_smarty_tpl->_subTemplateRender("file:javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php }?>
    </head>
    <body>
        <header>
            <?php $_smarty_tpl->_subTemplateRender("file:components/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </header>
        <?php $_smarty_tpl->_subTemplateRender("file:components/load.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
