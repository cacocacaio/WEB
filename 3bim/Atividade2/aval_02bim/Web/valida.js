$(document).ready(function(){
	$("#datafundacao").datepicker({
	});

	$("#datacadastro").datepicker({
	});
	
	$("#textoNome, #textoDataFundacao, #textoDataCadastro, #textoEmail").css({"color": "red", "font-size": "10px"});
	$("#textoNome, #textoDataCadastro,#textoDataFundacao, #textoEmail").hide();
});


function validar(){
	$("#textoNome, #textoDataCadastro,#textoDataFundacao, #textoEmail").hide();
	now = new Date;
	var datac = document.querySelector("#datacadastro").value;
	var dataf = document.querySelector("#datafundacao").value;

	var teste = 0;
	var validou = 0;
	var nome = document.querySelector("#nome").value;
	
	var dataCad = document.querySelector("#datacadastro").value.split('/');
	var diac = dataCad[0];
	var mesc = dataCad[1];
	var anoc = dataCad[2];

	
	var dataFun = document.querySelector("#datafundacao").value.split('/');
	var diaf = dataFun[0];
	var mesf = dataFun[1];
	var anof = dataFun[2];
	
	var email = document.querySelector("#email").value;
	
	diac = parseInt(diac);
	mesc = parseInt(mesc);
	anoc = parseInt(anoc);
	
	diaf = parseInt(diaf);
	mesf = parseInt(mesf);
	anof = parseInt(anof);

//Validação do nome//
	if (nome.length < 1) {
		$("#textoNome").show();
		validou = 1;
	}

//Validação do email//
	for (var i = 0; i < email.length; i++) {
		if (email[i] == '@') {
			teste = 1;
		}
	}
	
	if (teste == 0) {
		$("#textoEmail").show();
			validou = 1;
	}

//Validação da data Cadastro//
	if (datac == ""){
		$("#textoDataCadastro").show();
		validou = 1;
	}

	else if ((anoc > 2016) || (anoc<2000)){				
		$("#textoDataCadastro").show();
		validou = 1;
	}
	else if (anoc == now.getFullYear()){
		if (mesc > (now.getMonth()+1)){
			$("#textoDataCadastro").show();
			validou = 1;
		}
		else if ((mesc == (now.getMonth()+1)) && (diac > now.getDate())){
			$("#textoDataCadastro").show();
			validou = 1;
		}
	}

//Validação da data Fundação//
	if (dataf == ""){
		$("#textoDataFundacao").show();
		validou = 1;
	}
	else if ((anof > 2016) || (anof<1950)){				
		$("#textoDataFundacao").show();
		validou = 1;
	}
	else if (anof == now.getFullYear()){
		if (mesf > (now.getMonth()+1)){
			$("#textoDataFundacao").show();
			validou = 1;
		}
		else if (mesf == (now.getMonth()+1)){
			if (diaf > now.getDate()){
				$("#textoDataFundacao").show();
				validou = 1;
			}
		}
	}

//mensagem ok//
	if (validou == 0){
		alert("Dados gravados com sucesso!!");
		limpa();
	}
};

function limpa(){
	document.querySelector("#nome").value = "";
	document.querySelector("#datacadastro").value = "";
	document.querySelector("#datafundacao").value = "";
	document.querySelector("#email").value = " ";
	$("#textoNome, #textoDataFundacao, #textoDataCadastro, #textoEmail").hide();
	validou = 0;
};
