<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/logon.css">
    <script type="text/javascript" src="../js_lib/copyright.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js "></script>
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
            
            <p id=msg>{$msg}</p>
            <form method="post" action={$action}>
                <label>Logon-id</label>
                <input type="text" name="logon">
                <br>
                <label>Paswoord</label>
                <input type="password" name="paswoord">
                <br>
                <label>Permanent<br>(8 hours)</label>
                <input type="checkbox" name="persist">
                <br>
                <button type="submit" class="btn btn-secondary btn-block">Log in</button>

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
                <script language="javascript">
                    document.write(copyRight(" | Web Developer "));
                </script>
            </p>

        </footer>
    </div>

</body>

</html>