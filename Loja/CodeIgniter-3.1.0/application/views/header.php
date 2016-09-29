		<div class="container">
			
			<div class="masthead">
				
				<?php echo heading('Lojão do Terceirão', 3, 'class="muted"');?>
				<ul class="nav nav-tabs">
					
					<li class="active"> <?php echo anchor(base_url(), "Home")?> </li>
					<li class="dropdown">
						
						<?php echo anchor (base_url("produtos"), " Produtos <b class='caret'> </b>",
						array("class"=>"dropdown-toggle","data-toggle"=>"dropdown"));?>
						<ul class ="dropdown-menu">
							
							<li><?php echo anchor(base_url(), "Categoria 1")?></li>
							<li><?php echo anchor(base_url(), "Categoria 2")?></li>
						</ul>
					</li>
					<li><?php echo anchor(base_url('fale-conosco'), "Fale Conosco") ?> </li>
					<li>
						<?php $atributos = array("name"=>"form_busca", "class"=>"navbar-search pull-right");
						echo form_open( base_url("home/buscar"), $atributos);
						echo form_input(array('type'=>'text', 'name'=>'txt_busca', 'placeholder'=>'buscar', 'class'=>'search-query'));
						echo form_input(array('type'=>'submit', 'name'=>'btn_busca', 'value'=>'Buscar'));
						echo form_close();
						?>
					</li>
				</ul>
			</div>
