<?php
    include 'calendario.php';
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset=UTF-8>
        <title>Calendário</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body onload="showCalendario()">
	    <div class="calendario">
	     <?php 
	         calendarioFormat();
	     ?>
	    </div>

    	<script type="text/javascript" src="js/functions.js"></script>
    </body>
</html>