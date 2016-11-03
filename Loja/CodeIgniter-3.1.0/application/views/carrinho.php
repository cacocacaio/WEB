<?php

	echo form_open(base_url("carrinho/ atualizar"));
	$contador = 1;
	foreach($this->cart->contents() as $item){
		
		echo form_hidden($contador . '[rowid]', $item['rowid']) .
			"<div class='row-fluid linha-carrinho'>".
			"<div class='span1'>" . anchor(base_url('carrinho/remover/' . $item['rowid']),
			"Remover") . "</div>" .
			"<div class = 'span2'>" . img(array("src"=>$item['foto'], "class"=>"miniatura")) .
			"</div>" .
			"<div class ='span3'>" . anchor($item['url'], $item['name']) . "</div> </a>".
			"<div class ='span2'>" . form_input(array("name"=>$contador."[qty]",
			"value"=>$item['qty'])) . "</div>" .
			"<div class='span2 texto-direita'>". reais($item['price']) . "</div>".
			"<div class='span2 texto-direita'>". reais($item['subtotal']) . "</div>".
			"</div>";
		$contador ++;
	}
	echo br() . "<div class='row-fluid'>".
		"<div class='span3'>" . form_submit("btnAtualizar", "Atualizar quantidades") .
		"</div>".
		"<div class='span6'>" . anchor(base_url('carrinho/pagar') ,
		"Pagar e finalizar compra") . "</div>".
		"<div class='span1 texto-direita'>Total: </div>".
		"<div class='span2 texto-direita'>". reais($this->cart->total()) . "</div >".
		"</div>".
		form_close() ;
