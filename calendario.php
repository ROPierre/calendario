<?php
	
	// FUNÇÃO PARA A QUANTIDADE DE DIAS EM UM MÊS
	function qntDiasMes(){
		$diasMes = array();

		for($i = 1; $i <= 12; $i++){
			$diasMes[$i] = cal_days_in_month(CAL_GREGORIAN, $i , date('Y'));
		}

		return $diasMes;
	}

	// FORMATAÇÃO DO CALENDÁRIO
	function calendarioFormat(){

		$days = array(
			'Sun',
			'Mon',
			'Tue',
			'Wed',
			'Thu',
			'Fri',
			'Sat'
		);	

		$dias = array(
			'Dom',
			'Seg',
			'Ter',
			'Qua',
			'Qui',
			'Sex',
			'Sab'
		);

		$arrayMeses = array(
			1	=>	'Janeiro',
			2	=>	'Fevereiro',
			3	=>	'Março',
			4	=>	'Abril',
			5	=>	'Maio',
			6	=>	'Junho',
			7	=>	'Julho',
			8	=>	'Agosto',
			9	=>	'Setembro',
			10	=>	'Outubro',
			11	=>	'Novembro',
			12	=>	'Dezembro'
		);

		$qntDiasMes = qntDiasMes();
		$arrayRetorno = array();
		
		for($i = 1; $i <= 12; $i++){
			$arrayRetorno[$i] = array();
			for($j = 1; $j <= $qntDiasMes[$i]; $j++){
				$d = GregorianToJD($i, $j, date('Y'));
				$w = JDDayOfWeek($d, 2);
				$arrayRetorno[$i][$j] = $w;
			}
		}

		// CRIANDO O VISUAL DO CALENDÁRIO
		echo '<a href="#" id="anterior">&laquo; Anterior</a>';
		echo '<a href="" id="proximo">Próximo &raquo;</a>';

		echo '<table style="border: 0; width: 100%">';

		// FUNÇÃO DE RETORNO DO MÊS (NOME E DIAS)
		foreach($arrayMeses as $num => $mes){
			echo '<tbody id = "mes_'.$num.'" class = "mes">';
				echo '<tr id="mesNome" class="mes_nome"><td colspan = "7">'.$mes.'</td></tr>';
				echo '<tr class="dias_nome">';


				foreach ($dias as $i => $d) {
					echo '<td>'.$d.'</td>';
				}

				echo '</tr>';
				echo'<tr>';
				
				$cont = 0;

				// DIAS DO MÊS
				foreach ($arrayRetorno[$num] as $numero => $dia) {
					$cont++;
				 	if($numero == 1){
				 		$pular = array_search($dia, $days);
				 		// CASO COMECE NO MEIO DA SEMANA, CRIAR ESPAÇOS VAZIOS
				 		for($i = 1; $i <= $pular; $i++){
				 			echo '<td></td>';
				 			$cont+= 1;
				 		}
				 	}
				 	echo '<td id="mes_'.$num.'_dia_'.$numero.'" >'.$numero.'</td>';
				 	
				 	if($cont == 7){
				 		$cont = 0;
				 		echo '</tr>';
				 		echo '<tr>';
				 	}
				 } 
				 echo '</tr>';
			echo '</tbody>';
		}
		echo '</table>' ;


	}

?>