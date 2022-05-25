<?php
/* Smarty version 3.1.31, created on 2022-05-10 16:30:34
  from "/Users/micky/Documents/www/webo/C_Applicaties/APP_13_final/smarty/templates/content.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_627a932ae66ba0_88015638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87febea25261b8fffc203c7f1fdb4b9a642789cf' => 
    array (
      0 => '/Users/micky/Documents/www/webo/C_Applicaties/APP_13_final/smarty/templates/content.tpl',
      1 => 1522154988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_627a932ae66ba0_88015638 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<link href="../css/content.css" rel="stylesheet" type="text/css">
	<?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
	<title>ledenadmin - more info</title>
</head>

<body>
	<div id="wrapper">
		<main>
			<?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

			<input type='button' value='Venster sluiten' onclick='window.close()'>
		</main>
		<footer>
			<?php echo '<script'; ?>
>
				document.write(copyRight("webontwikkeling.info"));

			<?php echo '</script'; ?>
>
		</footer>
	</div>
</body>

</html>
<?php }
}
