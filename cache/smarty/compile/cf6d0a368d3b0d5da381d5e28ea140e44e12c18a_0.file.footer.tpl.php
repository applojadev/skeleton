<?php
/* Smarty version 3.1.30, created on 2022-11-11 21:33:20
  from "C:\wamp64\www\skeleton\mvc\front\view\theme\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_636edbc01165e4_80570143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf6d0a368d3b0d5da381d5e28ea140e44e12c18a' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\front\\view\\theme\\footer.tpl',
      1 => 1668208346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:javascript.tpl' => 1,
  ),
),false)) {
function content_636edbc01165e4_80570143 (Smarty_Internal_Template $_smarty_tpl) {
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
