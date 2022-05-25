<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/ledenadmin.css" rel="stylesheet" type="text/css">

<script src="../js_lib/copyright.js"></script>

{section name=teller loop=$jsInclude}
    <script src="{$jsInclude[teller]}"></script>
{/section}

<title>Leden administratie</title>
</head>

<body>
<div id="mainbox">
	<header>
		<img src="../images/webontwikkeling.jpeg"  height="100%" alt="webontwikkeling"/>
		<p>Web-ontwikkeling</p>
	</header>
	<nav>
		<ul>
		     {section name=teller loop=$menu}
          <li><a href="{$menu[teller].d_link}">{$menu[teller].d_item}
            	</a>
          </li>
     {/section}
		</ul> 
	</nav>
  
	<main>
		<article id="artleft">
			{$commentaar|default:"<h1>leden-admin</h1>"}
			
		</article>
		<article id="artright">
			{$inhoud}
		</article>
	</main>
  
	<footer>
		<script language="javascript">
			document.write(copyRight("webontwikkeling.info"));
		</script>
	</footer>
  
</div>

</body>
</html>
