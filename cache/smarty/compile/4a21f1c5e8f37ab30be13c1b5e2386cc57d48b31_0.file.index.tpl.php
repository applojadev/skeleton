<?php
/* Smarty version 3.1.30, created on 2022-11-07 17:20:18
  from "C:\wamp64\www\skeleton\mvc\admin\view\theme\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63695a72efaf24_67963552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a21f1c5e8f37ab30be13c1b5e2386cc57d48b31' => 
    array (
      0 => 'C:\\wamp64\\www\\skeleton\\mvc\\admin\\view\\theme\\index.tpl',
      1 => 1667848436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63695a72efaf24_67963552 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
    <main>

        <p><h1>Olá mundo!</h1></p>
        <h3>Estou funcionando com bootstrap 4</h3>
        
        <div class="alert alert-success" role="alert">
            Eu sou um teste do admin
        </div>
        
    </main> 
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
