<?php
/* Smarty version 3.1.31, created on 2022-05-30 18:20:08
  from "C:\wamp\www\Parenting_ASD\smarty\templates\logon.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_62950ad8117d56_15584770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7d72c57ec4b939f190ef53e223ad056ad6475df' => 
    array (
      0 => 'C:\\wamp\\www\\Parenting_ASD\\smarty\\templates\\logon.tpl',
      1 => 1653934786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62950ad8117d56_15584770 (Smarty_Internal_Template $_smarty_tpl) {
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
            <h2>Welcom back!</h2>
            
            <p id=msg><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
            <form method="post" action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
>
                <label>Logon-id</label>
                <input type="text" name="logon">
                <br>
                <label>Paswoord</label>
                <input type="password" name="paswoord">
                <br>
                <label>Permanent<br>(8 hours)</label>
                <input type="checkbox" name="persist">
                <br>
                <input type="submit" name="submit" value="Log in" id="logInButton">

                <div id="forgot">
                <br>
                    <a href="../scripts/P_vergeten.php ">Forgot your password?</a>
                </div>
            </form>

        </div>
        <br>
        <h3>Don't have an account?</h3>
        <br>

        <h4>It's Free! <a href="../scripts/A_signUp.php ">Sign up</a></h4>

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

</html><?php }
}
