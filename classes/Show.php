<?php

class Show
{
	public $lista;
	public $dados;
	public $retorno;
	public $ordem;

	public function geraLista($lista,$ordem)
	{
    	$this->retorno = '
    	<h3>Listando clientes</h3>

	      <ul class="nav nav-tabs" role="tablist">
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="?ordem=asc">
	          Ordenar <span class="caret"></span>
	        </a>
	        <ul class="dropdown-menu" role="menu">
	          <li><a href="?ordem=asc">ascendente</a></li>
	          <li><a href="?ordem=desc">decrecente</a></li>
	        </ul>
	      </li>
	    </ul>


	    ';

	    if($ordem == 'asc'){
			ksort ($lista);
		}else{
		  	krsort ($lista);
		}


	   $this->retorno .=  "
	  <div class=\"panel panel-default\">
      <!-- Default panel contents -->
      <div class=\"panel-heading\">Clientes</div>

      <!-- Table -->
      <table class=\"table\">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Reputação</th>
          </tr>
        </thead>
        <tbody>
	   ";
    	foreach ($lista as $key => $cliente) {

    		if($cliente->getIsJuridica()){
    			$tipo = 'P. Jurídica';
    		}else{
    			$tipo = 'P. Física';	
    		}

    		$stars = '';
    		for ($i = 1; $i <= $cliente->getStars(); $i++) {
    			$stars .= '<span>&#9734;</span>';
			}

    		$this->retorno .= '<tr>
					            <td>'.$cliente->getId().'</td>
					            <td><a href="/clientes/'.$key.'">'.$cliente->getNome().'</a></td>
					            <td>'.$tipo.'</td>
					            <td>
								<div class=\"rating\">
								'.$stars.'
								</div>
					            </td>
					          </tr>';

			unset($stars);
		}
		$this->retorno .= '
        	</tbody>
      		</table>
    	</div>
		';

		return $this->retorno;
	}

	/* mostra o conteudo do cliente escolhido */
	public function geraConteudo($cliente)
	{	

		$stars = '';

		echo '';

		$valorStars = $cliente->getStars();

    	for ($i = 1; $i <= $valorStars; $i++) {
    		$stars .= '<span>&#9734;</span>';
		}

		// Pegando os enderecos
		$enderecos = $cliente->getEnderecos();
		$mostraEndeco = '<ul class="list-group">';
        foreach ($enderecos as $endereco) 
        {

        	$cobranca = '';
        	if($endereco->getEnderecoCobranca()){
        		$cobranca = '<span class="label label-default">Cobrança</span>';
        	}
        	$mostraEndeco .= '
        				<li class="list-group-item">
					  		'.$cobranca.'
							<div class="form-group">
					            <label class="col-sm-2 control-label">Endereco</label>
					            <div class="col-sm-10">
					              <p class="form-control-static">'.$endereco->getEndereco().'</p>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <label class="col-sm-2 control-label">Cidade</label>
					            <div class="col-sm-10">
					              <p class="form-control-static">'.$endereco->getCidade().'</p>
					            </div>
				          	</div>
				          	<div class="form-group">
					            <label class="col-sm-2 control-label">Estado</label>
					            <div class="col-sm-10">
					              <p class="form-control-static">'.$endereco->getEstado().'</p>
					            </div>
				          	</div>				          	
					  	</li>';
        }

        $mostraEndeco .= '</ul>';

		$completaForm = '';
		if($cliente->getIsJuridica()){

    		$completaForm .= '
    				  <div class="form-group">
			            <label class="col-sm-2 control-label">Nome Fantasia</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$cliente->getNome().'</p>
			            </div>
			          </div>
					  <div class="form-group">
			            <label class="col-sm-2 control-label">Razão Social</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$cliente->getRazaoSocial().'</p>
			            </div>
			          </div>
					  <div class="form-group">
			            <label class="col-sm-2 control-label">CNPJ</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$cliente->getCnpj().'</p>
			            </div>
			          </div>			          
			          ';

    	}else{

    		$completaForm .= '
    				<div class="form-group">
			            <label class="col-sm-2 control-label">Nome</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$cliente->getNome().'</p>
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-2 control-label">Cpf</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$cliente->getCpf().'</p>
			            </div>
			          </div>
			          ';
    	}
		
		//$dados->getNome()
		$this->retorno = '
		    <h3></span> Informações do clientes</h3>

		    <div class="panel panel-default">
		      <div class="panel-body">
		        
		            <!-- mostra -->

		            <form class="form-horizontal" role="form">
			          <div class="form-group">
			            <label class="col-sm-2 control-label">Reputação</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$stars.'</p>
			            </div>
			          </div>

					  '.$completaForm.'

			          <div class="form-group">
			            <label class="col-sm-2 control-label">Email</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$cliente->getEmail().'</p>
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-sm-2 control-label">Telefone</label>
			            <div class="col-sm-10">
			              <p class="form-control-static">'.$cliente->getTelefone().'</p>
			            </div>
			          </div>

			          '.$mostraEndeco.'

            
			        </form>

		      </div>
		    </div>  
		    <!-- Standard button -->
		    <button type="button" onClick="javascript:history.go(-1)" class="btn btn-default">Voltar</button>
		';
		return  $this->retorno;
	}
}