<?php
/* Smarty version 3.1.30, created on 2022-11-11 17:22:32
  from "C:\wamp64\www\skeleton\mvc\front\view\theme\breadcrumb.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_636ea0f87af270_85754003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d9cf08f89998bbd341ebeea15069287d862f888' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\front\\view\\theme\\breadcrumb.tpl',
      1 => 1668194550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636ea0f87af270_85754003 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['breadcrumb']->value) && count($_smarty_tpl->tpl_vars['breadcrumb']->value) > 0) {?>   
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumb']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                <li 
                    class="breadcrumb-item <?php if ($_smarty_tpl->tpl_vars['item']->value['active']) {?>active<?php }?>"
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['active']) {?>aria-current="page"<?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['active']) {
echo $_smarty_tpl->tpl_vars['item']->value['rotulo'];
} else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['rotulo'];?>
</a><?php }?>
                </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ol>
    </nav>
<?php }
}
}
