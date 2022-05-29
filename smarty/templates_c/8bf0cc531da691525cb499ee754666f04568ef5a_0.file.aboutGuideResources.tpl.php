<?php
/* Smarty version 3.1.31, created on 2022-05-29 14:58:27
  from "C:\wamp\www\Parenting_ASD\smarty\templates\aboutGuideResources.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_62938a13427f89_77258642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bf0cc531da691525cb499ee754666f04568ef5a' => 
    array (
      0 => 'C:\\wamp\\www\\Parenting_ASD\\smarty\\templates\\aboutGuideResources.tpl',
      1 => 1653836272,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62938a13427f89_77258642 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/about.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
    <title>About Page</title>
</head>

<body>
    <div id="container">

        <header>
            <div id="header1">
                <a href="../index.php">
                    <div id="logo">
                        <img src="../images/logo.png" alt="logo" width="65">
                        <h2>parenting-asd</h2>
                    </div>
                </a>
                <div id="authentication">
                    <a href="../scripts/A_logon.php" id="logIn">Log in</a>
                    <a href="../scripts/A_signUp.php" id="signUp">Sign up</a>
                </div>
            </div>
        </header>

        <main>
            
                <?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

          
        </main>

        <footer>
            <p></p>
            <p id="copyRight">Laura Ciocalau |
                <?php echo '<script'; ?>
 language="javascript">
                    document.write(copyRight(" | Web Developer"));
                <?php echo '</script'; ?>
>
            </p>
        </footer>

    </div>
</body>

</html><?php }
}
