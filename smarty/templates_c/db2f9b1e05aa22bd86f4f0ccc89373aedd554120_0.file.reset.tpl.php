<?php
/* Smarty version 3.1.31, created on 2022-05-26 11:09:42
  from "C:\wamp\www\Parenting_ASD\smarty\templates\reset.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_628f5ff61326e7_52736323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db2f9b1e05aa22bd86f4f0ccc89373aedd554120' => 
    array (
      0 => 'C:\\wamp\\www\\Parenting_ASD\\smarty\\templates\\reset.tpl',
      1 => 1653058601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628f5ff61326e7_52736323 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/ledenadmin.css" rel="stylesheet" type="text/css">

<?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js_lib/vergelijk.js"><?php echo '</script'; ?>
>
<title>Leden administratie</title>
</head>

<body>
<div id="mainbox">
	<header>
		<img src="../images/webontwikkeling.jpeg"  height="100%" alt="webontwikkeling"/>
		<p>Web-ontwikkeling</p>
	</header>
	
  
	<main>
			<?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

	</main>
  
	<footer>
		<?php echo '<script'; ?>
 language="javascript">
			document.write(copyRight("webontwikkeling.info"));
		<?php echo '</script'; ?>
>
	</footer>
  
</div>

</body>
</html>
<?php }
}