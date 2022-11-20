<?php
/* Smarty version 3.1.30, created on 2022-11-13 15:38:07
  from "C:\wamp64\www\skeleton\email\e-logo.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63712b7fe9f539_90690928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f4edf5966210b663dd82d728aa923ec8c625184' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\email\\e-logo.tpl',
      1 => 1668348576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63712b7fe9f539_90690928 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['logo']->value == '') {?>
    <span style="font-size:36px;color:#000000"><?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</span>
<?php } else { ?>
    <a title="<?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
" style="color:#337ff1">
        <img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
" height='80px' width='215px'/>
    </a>
<?php }
}
}
