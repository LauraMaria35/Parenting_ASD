<?php
/* Smarty version 3.1.31, created on 2022-05-29 21:40:05
  from "C:\wamp\www\Parenting_ASD\smarty\templates\reset.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6293e8351076c2_48027132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db2f9b1e05aa22bd86f4f0ccc89373aedd554120' => 
    array (
      0 => 'C:\\wamp\\www\\Parenting_ASD\\smarty\\templates\\reset.tpl',
      1 => 1653860393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6293e8351076c2_48027132 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/logon.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../bootstrap/js/bootstrap.min.js "><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <title>Log on</title>

</head>

<body>
    <div id="container">
        <div class="title">
            <a href="../index.php">
                <div id="logo">
                    <img src="../images/logo.png" alt="logo">
                    <h1>parenting-asd</h1>
                </div>
            </a>
        </div>
        <br>

        <div id="signUpBox">
            <br>

			<?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

</div>
   <footer>
            <div id="footerDiv"></div>
            <p id="copyRight">Laura Ciocalau |
                <?php echo '<script'; ?>
 language="javascript">
                    document.write(copyRight(" | Web Developer "));
                <?php echo '</script'; ?>
>
            </p>

        </footer>
    </div>

</body>

</html>
<?php }
}
