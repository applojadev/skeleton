<?php
/* Smarty version 3.1.30, created on 2022-11-11 14:26:33
  from "C:\wamp64\www\skeleton\mvc\front\view\theme\dynamic-css.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_636e77b9bf91a4_05097349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f70eef0bb0aae7c2f910e10e0b0c27945c329ee7' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\front\\view\\theme\\dynamic-css.tpl',
      1 => 1668183981,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636e77b9bf91a4_05097349 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style>        
    .dynamic-primary-color{
        background-color: <?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('primary_color');?>
 !important;
    }
    .dynamic-secondary-color{
        background-color: <?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('secondary_color');?>
 !important;
    }
    .dynamic-primary-color-text{
        color: <?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('primary_color');?>
 !important;
    }
    .dynamic-secondary-color-text{
        color: <?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('secondary_color');?>
 !important;
    }   
    .loader {
        border-top-color: <?php echo $_smarty_tpl->tpl_vars['colors']->value->getValue('load_color');?>
 !important;
    }
    @media screen and (max-width: 300px) { 
        
    }        
</style><?php }
}
