<?php
/* Smarty version 3.1.30, created on 2022-11-13 15:38:07
  from "C:\wamp64\www\skeleton\email\e-message.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63712b7feb6c46_27385841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9afcad448bb69484734d9c92f66ff20912cf3ce8' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\email\\e-message.tpl',
      1 => 1668348576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63712b7feb6c46_27385841 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['message']->value != '') {?>
	<tr>
		<td class="space_footer" style="padding:0!important">&nbsp;</td>
	</tr>
	<tr>
		<td class="linkbelow" style="padding:7px 0">
			<font size="2" face="Open-sans, sans-serif" color="#555454">
				<span>
					<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
: <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
" style="color:#337ff1">
						<?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</a></span>
			</font>
		</td>
	</tr>
<?php }
}
}
