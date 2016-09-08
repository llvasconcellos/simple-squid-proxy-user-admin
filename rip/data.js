function ajustar_data(input , evento){
	var BACKSPACE=  8;
	var DEL=  46;
	var FRENTE=  39;
	var TRAS=  37;
	var key;
	var tecla;
	var strValidos = "0123456789" ;
	var temp;
	tecla= (evento.keyCode ? evento.keyCode: evento.which ?	evento.which : evento.charCode)
	//alert(tecla)
	if (( tecla == BACKSPACE )||(tecla == DEL)||(tecla == FRENTE)||(tecla == TRAS)) {
		return true;
	}
	if ( tecla == 13 ) return true;
	if ((tecla<48)||(tecla>57)){
		return false;
	}
	if(document.selection.createRange().text == input.value) return true;
	key = String.fromCharCode(tecla);
	input.value = input.value+key;
	temp="";
	for (var i = 0; i<input.value.length;i++ ) {
		if (temp.length==2) temp=temp+"/";
		if (temp.length==5) temp=temp+"/";
		if ( strValidos.indexOf( input.value.substr(i,1) ) != -1 ) {
			temp=temp+input.value.substr(i,1);
		}
	}
	input.value = temp.substr(0,10);
	return false;
}

function validacao_data(data){
	hoje = new Date();
	anoAtual = hoje.getFullYear();
	horaAtual = hoje.getTime();
	alert(horaAtual);
	barras = data.split("/");
	if (barras.length == 3){
		dia = barras[0];
		mes = barras[1];
		ano = barras[2];
		resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4));
		if (!resultado) {
			alert("Formato de data inválido!");
			return false;
		}
		else return true;
	}
	else {
		alert("Formato de data inválido!");
		return false;
	}
}