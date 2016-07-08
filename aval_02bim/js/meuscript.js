$(document).ready (function(e){
	
	$(".header a").click (function(e){
		
		e.preventDefault();
		var href = $(this) . attr('href');
		$(".conteudo").load(href+" .conteudo > *",
		
			function(){
				
				$(".conteudo a").click(function(e){
			
					e.preventDefault();
					var href = $(this) . attr('href');
					$(".conteudo").load(href+" .conteudo > *",
					
						function(){
							$("#textoNome, #textoDataFundacao, #textoDataCadastro, #textoEmail").css({"color": "red", "font-size": "10px"});
							$("#textoNome, #textoDataFundacao, #textoDataCadastro, #textoEmail").hide();
							$("#nome").focus();

							$("#datacadastro").datepicker();
							
							$("#datafundacao").datepicker();
						}
					);
				});
			}
		);
	});
});

function validarCliente(){
	
	$("#textoNome, #textoDataCadastro, #textoEmail").hide();
	now = new Date;
	var teste = 0;
	var validou = 0;
	var nomeTexto = document.querySelector("#nome").value;
	
	var datac = document.querySelector("#datacadastro").value;
	var dataCad = document.querySelector("#datacadastro").value.split('/');
	var diac = dataCad[0];
	var mesc = dataCad[1];
	var anoc = dataCad[2];
	
	var email = document.querySelector("#email").value;
	
	diac = parseInt(diac);
	mesc = parseInt(mesc);
	anoc = parseInt(anoc);
	
	//Validação do nome//
	if (nomeTexto.length < 1) {
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

	//mensagem ok//
	if (validou == 0){
		alert("Dados gravados com sucesso!!");
		return true;
	}else{
		return false;
	}
};

function validarFornecedor(){
	
	$("#textoNome, #textoDataFundacao, #textoEmail").hide();
	now = new Date;
	var teste = 0;
	var validou = 0;
	var nomeTexto = document.querySelector("#nome").value;
	
	var dataf = document.querySelector("#datafundacao").value;
	var dataFun = document.querySelector("#datafundacao").value.split('/');
	var diaf = dataFun[0];
	var mesf = dataFun[1];
	var anof = dataFun[2];
	
	var email = document.querySelector("#email").value;
	
	diaf = parseInt(diaf);
	mesf = parseInt(mesf);
	anof = parseInt(anof);
	
	//Validação do nome//
	if (nomeTexto.length < 1) {
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
		return true;
	}else{
		return false;
	}
};

function confirm_delete(){
	
	return confirm("Tem certeza que deseja excluir?");
}

function limpaFornecedor(){
	
	$("#textoNome, #textoDataFundacao, #textoEmail").hide();
}

function limpaCliente(){
	
	$("#textoNome, #textoDataCadastro, #textoEmail").hide();
}
