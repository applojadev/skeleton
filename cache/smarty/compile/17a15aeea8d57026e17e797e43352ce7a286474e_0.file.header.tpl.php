<?php
/* Smarty version 3.1.30, created on 2022-11-07 17:20:18
  from "C:\wamp64\www\skeleton\mvc\admin\view\theme\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63695a72f3d5b2_45966349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17a15aeea8d57026e17e797e43352ce7a286474e' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\admin\\view\\theme\\header.tpl',
      1 => 1667848208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:javascript.tpl' => 1,
  ),
),false)) {
function content_63695a72f3d5b2_45966349 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
  <html lang=”pt-br”>
      <head>
          <meta charset="utf-8">
          <title>Sem nome</title>
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <?php if (isset($_smarty_tpl->tpl_vars['tools_file']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tools_file']->value['CSS'], 'item');
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
          <?php if ($_smarty_tpl->tpl_vars['move_js_to_finish']->value == "false") {?>
            <?php $_smarty_tpl->_subTemplateRender("file:javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <?php }?>
      </head>
      <body>
          <header>

          </header><?php }
}
