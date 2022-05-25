<!doctype html>
<html>

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css/logon.css">
    <script src="../js_lib/copyright.js"></script>
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

            <p id=msg>{$msg}</p>
            <form method=post action={$action}>
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
                <script language="javascript">
                    document.write(copyRight(" | Web Developer"));
                </script>
            </p>
        </footer>

</html>
