var data = new Date;

var mesAtual = data.getMonth()+1;

var dataAtual = data.getDate();
var diaShow = document.getElementById("mes_" + mesAtual + "_dia_" + dataAtual);
diaShow.classList.add("atual");

// FUNÇÃO PARA MOSTRAR E ESCONDER O CALENDÁRIO
function showCalendario(){
	
	var mes = [];
	var i;

    for(i = 0; i < 12; i++){
    	mes[i] = document.getElementsByClassName("mes")[i];

    	if(mes[i].id === "mes_" + mesAtual){
    		mes[i].style.display = "block";

    	} else {
    		mes[i].style.display = "none";
    	}
    }


}

// ONCLICK PARA PRÓXIMO MÊS
document.getElementById("proximo").onclick = function(){
	mesAtual++;
    if(mesAtual > 12){
    	mesAtual = 1;
    }
	showCalendario();
	return false;
}

// ONCLICK PARA MÊS ANTERIOR
document.getElementById("anterior").onclick = function(){
	mesAtual--;
    if(mesAtual< 1){
    	mesAtual = 12;
    }
	showCalendario();
	return false;
}
