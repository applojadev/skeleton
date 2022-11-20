<?php
/* Smarty version 3.1.30, created on 2022-11-17 12:11:59
  from "C:\wamp64\www\skeleton\mvc\front\view\theme\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6376412facd2d6_52412307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a5f9b06289bc4954f1b6c4425a6a9b624ed9084' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\front\\view\\theme\\index.tpl',
      1 => 1668694284,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6376412facd2d6_52412307 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
    <main>
    
        <p><h1>Olá mundo!</h1></p>
        <h3>Estou funcionando com bootstrap 4</h3>
        
        <div class="alert alert-success" role="alert">
            Eu sou um teste do front com url: <?php echo $_smarty_tpl->tpl_vars['app']->value->getValue('url');?>

        </div>        

    </main> 
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
