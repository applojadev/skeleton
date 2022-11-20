<?php
/* Smarty version 3.1.30, created on 2022-11-07 17:20:19
  from "C:\wamp64\www\skeleton\mvc\admin\view\theme\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63695a73058dc7_20415546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0490d37b0e4c9629817257b05271f54acb45f08b' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\admin\\view\\theme\\footer.tpl',
      1 => 1667848155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:javascript.tpl' => 1,
  ),
),false)) {
function content_63695a73058dc7_20415546 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <footer>    
    
    </footer>
    <?php if ($_smarty_tpl->tpl_vars['move_js_to_finish']->value == true) {?>
      <?php $_smarty_tpl->_subTemplateRender("file:javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php }?>
  </body>
</html><?php }
}
