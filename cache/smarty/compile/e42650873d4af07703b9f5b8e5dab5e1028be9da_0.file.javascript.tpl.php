<?php
/* Smarty version 3.1.30, created on 2022-11-13 15:22:36
  from "C:\wamp64\www\skeleton\mvc\front\view\theme\javascript.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_637127dc0e2861_43636443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e42650873d4af07703b9f5b8e5dab5e1028be9da' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\front\\view\\theme\\javascript.tpl',
      1 => 1668360154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637127dc0e2861_43636443 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    const device                    = "<?php echo $_smarty_tpl->tpl_vars['device']->value;?>
";
    const app_env                   = "<?php echo $_smarty_tpl->tpl_vars['app_env']->value;?>
";
    const app_url                   = "<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>
";
    const app_name                  = "<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('name');?>
";    
    const app_preposition           = "<?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('preposition');?>
";    
    const domain                    = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('app','domain');?>
";
    const uri_base                  = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('app','uri_base');?>
";
    const router_login              = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('front','router_login');?>
";
    const router_forgot_password    = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('front','router_forgot_password');?>
";
    const router_new_register       = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('front','router_new_register');?>
";
    const router_admin              = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('admin','router_admin');?>
";
<?php echo '</script'; ?>
>

<?php if (isset($_smarty_tpl->tpl_vars['media']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['media']->value['JS'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['enabled']) {
echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo '</script'; ?>
><?php }?>        
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_js_front_dir_']->value;?>
global.js"><?php echo '</script'; ?>
><?php }
}
