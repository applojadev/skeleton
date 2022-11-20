<?php
/* Smarty version 3.1.30, created on 2022-11-07 17:20:19
  from "C:\wamp64\www\skeleton\mvc\admin\view\theme\javascript.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63695a730416c1_13081530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c611de40d89ebdbb3ef364c32238938dadb2f900' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\admin\\view\\theme\\javascript.tpl',
      1 => 1667848105,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63695a730416c1_13081530 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    const device                    = "<?php echo $_smarty_tpl->tpl_vars['device']->value;?>
";
    const site_url                  = "<?php echo $_smarty_tpl->tpl_vars['site']->value->getValue('url');?>
";
    const site_name                 = "<?php echo $_smarty_tpl->tpl_vars['site']->value->getValue('name');?>
";    
    const site_preposition          = "<?php echo $_smarty_tpl->tpl_vars['site']->value->getValue('preposition');?>
";    
    const domain                    = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('app','domain');?>
";
    const uri_base                  = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('app','uri_base');?>
";    
    const router_admin              = "<?php echo $_smarty_tpl->tpl_vars['dispatch']->value->getValue('admin','router_admin');?>
";
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_js_admin_dir_']->value;?>
global.js"><?php echo '</script'; ?>
>

<?php if (isset($_smarty_tpl->tpl_vars['tools_file']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tools_file']->value['JS'], 'item');
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

<?php }
}
}
