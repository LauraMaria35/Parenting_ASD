<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/about.css">
    <script type="text/javascript" src="../js_lib/copyright.js"></script>
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
            
                {$inhoud}
          
        </main>

        <footer>
            <p></p>
            <p id="copyRight">Laura Ciocalau |
                <script language="javascript">
                    document.write(copyRight(" | Web Developer"));
                </script>
            </p>
        </footer>

    </div>
</body>

</html>