<?php
try
{
	//********** Initialisatie
	require("../code/initialisatie.inc.php"); 

	//********** Input en verwerking
	/************ >>>>>> opgepast <<<<<< ************/
	// 2 soorten formulieren 	
	// indien geen formulier --> error	

	if (! isset($_POST["submitC"]) && ! isset($_POST["submitA"]))  // geen enkel formulier formulier 
	{
		throw new Exception("illegal access");
	}

	if (isset($_POST["submitC"])) // bevestigings formulier
	{
		//verwerk inhoud van het formulier	
		// copieer de inhoud van $_POST[lidnr'] (super global) naar lokale parameter	$_lidnr
		$_lid = $_POST['lid'];

		// Query samenstellen		
		$_query = "Select * FROM v_leden WHERE d_lid = '$_lid'"; 

		// Query naar DB sturen
		$_result = $_PDO -> query($_query); 

		// Resultaat van query verwerken

		if ($_result -> rowCount() == 0) // geen resultaat is db inconsistency 
		{
			throw new Exception("database inconsistency");
		}
		// hier gaan komen we enkel indien er geen 'db inconsistency'  was

		while ($_row = $_result -> fetch(PDO::FETCH_ASSOC)) 
		{
			//maak voor het geselecteerde lid een formulier en vul de velden inmet de huidige waarden	
			// voorzie een 'hidden formfield' met de key 			
			$_inhoud = 
				"<h1>Aanpassen</h1>
       <form  method='post' action='$_srv'>
         <input type ='hidden' name ='lid' value ='".$_row['d_lid']."'>
         <label>Naam</label>
           <input type='text' name='naam' value ='".$_row['d_naam']."'>
         <label >Voornaam</label>
           <input type='text' name='voornaam'value ='".$_row['d_voornaam']."'>
		       <label >Gender</label>";
			$_inhoud .= dropDown("gender","t_gender","d_gender", "d_mnemonic", 1, $_row['d_gender']);
			$_inhoud.="<label >Soort lid</label>";
			$_inhoud .= dropDown("soort","t_soortlid","d_soortLid", "d_mnemonic",1,$_row['d_soortlid']);
			$_inhoud.="
        <label >Straat</label>
           <input type='text' name='straat'  value ='".$_row['d_straat']."'>
        <label >Nr & Extra</label>
          <input type='text' name='nr' size='10' value ='".$_row['d_nr']."'>
          <input type='text' name='xtr' size='10' value ='".$_row['d_xtr']."'>
       <label >Postcode</label>
          <input type='text' name='postcode' size='10' value ='".$_row['d_postnummer']."'>
       <label >Gemeente</label>
          <input type='text' name='gemnaam'size='20' value ='".$_row['d_gemeenteNaam']."'>
       <label >Telefoon</label>
         <input type='text' name='tel' size='15' value ='".$_row['d_tel']."'>
       <label >Mobiel</label>
         <input type='text' name='mob' size='15' value ='".$_row['d_mob']."'>
 	     <label >E-mail</label>
         <input type='text' name='mail' size='80' value ='".$_row['d_mail']."'>
		    <input type='submit' name='submitA'  value='Aanpassen'>
     </form>";
		}
	}
	else // formulier met aangepaste data
	{		
		// verwerk inhoud van het formulier	
		// copieer de inhoud van $_POST (super global) naar lokale parameters		
		// verwerk inhoud van het formulier	
		require("../code/inputUitpakken.inc.php");

		// extra $_POST 
		$_lid =$_POST["lid"];

		$_gemeentePK = PK_t_gemeente($_postcode, $_gemeenteNaam);

		// Maak met de ingevoerde waarden de bijhorende update query.
		// we updaten alle velden

		$_query= "UPDATE t_leden
								SET d_naam = '$_naam',
										d_voornaam = '$_voornaam',
										d_straat = '$_straat',
										d_nr = '$_nr',
										d_Xtr = '$_xtr',
										d_gemeente = '$_gemeentePK',
										d_tel = '$_telefoon',
										d_mob = '$_mob',
										d_mail = '$_mail',
										d_gender ='$_gender',
										d_soortLid = '$_soort'
								WHERE d_lid = $_lid ;";	
		// Query naar DB sturen
		
		$_result = $_PDO -> query($_query);     

		//gegevens van het lid zijn aangepast

		$_inhoud = "<br><br><br><br><br><br><h2>de gegevens voor&nbsp;&nbsp;$_voornaam&nbsp;&nbsp;$_naam zijn aangepast</h2>";
	}

	//********** output
	// menu initialiseren  
	$_menu =  1;
	// linkse commentaar veld  
	$_commentaar = 'L_data_aanpassen_C.html';

	require("../code/output.inc.php");  
}

catch (Exception $_exception) //********** exception handling
{
	require("../php_lib/myExceptionHandling.inc.php"); 
}

?>