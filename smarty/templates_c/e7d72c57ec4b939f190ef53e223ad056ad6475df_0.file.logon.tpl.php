<?php
/* Smarty version 3.1.31, created on 2022-05-24 19:00:36
  from "C:\wamp\www\Parenting_ASD\smarty\templates\logon.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_628d2b540c5450_75011036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7d72c57ec4b939f190ef53e223ad056ad6475df' => 
    array (
      0 => 'C:\\wamp\\www\\Parenting_ASD\\smarty\\templates\\logon.tpl',
      1 => 1653418818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_628d2b540c5450_75011036 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css/logon.css">
    <?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
    <title>Log on</title>
</head>

<body>
    <div id="container">
        <div class="title">
            <div id="logo">
                <img src="../images/logo.png" alt="logo">
                <h1>parenting-asd</h1>
            </div>
            <br>

        </div>
        <br><br><br>

        <div id="signUpBox">
            <h3>Welcom back!</h3>
            <br>

            <p id=msg><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
            <form method=post action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
>
                <label>Logon-id</label>
                <input type=text name=logon>
                <br><br>
                <label>Paswoord</label>
                <input type=password name=paswoord>
                <br><br>
                <label>Permanent<br>(8 hours)</label>

                <input type=checkbox name=persist>
                <br><br>
                <input type=submit name='submit' value=Verzenden class=submit>
                <div class=clearfix></div>
                <div id='forgot'>
                    <a href=../scripts/P_vergeten.php>Forgot your password?</a>
                </div>
            </form>

        </div>
        <br>
        <br>
        <h3>Don't have an account?</h3>
        <br>

        <h4>It's Free! <a href="../scripts/A_signUp.php">Sign up</a></h4>

        <footer>
            <div id="footerDiv"></div>
            <p id="copyRight">Laura Ciocalau |
                <?php echo '<script'; ?>
 language="javascript">
                    document.write(copyRight(" | Web Developer"));
                <?php echo '</script'; ?>
>
            </p>
        </footer>

</html>
<?php }
}
