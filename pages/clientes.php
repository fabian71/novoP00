<?php
  
  require_once 'classes/ClienteInterface.php';
  require_once 'classes/Cliente.php';
  require_once 'classes/Endereco.php';
  require_once 'classes/PessoaJuridica.php';
  require_once 'classes/Show.php';

  $cliente = new Cliente(1, "Paulo", "paulo@email.com", "000.000.000-00", "(00) 0000-0000");
  $cliente->setStars(3);
  $cliente->addEndereco(new Endereco(true,"Rua dos teste","Maringá", "PR"));
  $cliente->addEndereco(new Endereco(null,"Rua dos teste 2","São Paulo", "SP"));
  $cliente->setCpf('037377332');
  $cliente->setIsjuridica($cliente->isJuridica());
  
  $arrayCliente[] = $cliente;
  
  $cliente = new PessoaJuridica(2,"Bar da esquina","Bar dois irmao LTDA","(00) 0000-0000");
  $cliente->setStars(4);
  $cliente->addEndereco(new Endereco(null,"avenida comercial, n33","Maringá", "PR"));
  $cliente->setCnpj('3242332423');
  $cliente->setEmail('bar@bar.com.br');
  $cliente->setIsjuridica($cliente->isJuridica());
  $arrayCliente[] = $cliente;

  $cliente = new Cliente(3, "Fabiano", "fabiano@email.com", "077.200.000-00", "(00) 2200-0110");
  $cliente->setStars(5);
  $cliente->addEndereco(new Endereco(null,"Rua xpto ","Curitiba", "PR"));
  $cliente->setCpf('099377322');
  $cliente->setIsjuridica($cliente->isJuridica());
  $arrayCliente[] = $cliente;


  $cliente = new Cliente(4, "Fernando", "fernando@email.com", "097.205.200-00", "(22) 8400-0860");
  $cliente->setStars(1);
  $cliente->addEndereco(new Endereco(null,"Rua bababa, 233","Sao Paulo", "SP"));
  $cliente->setCpf('083377317');
  $cliente->setIsjuridica($cliente->isJuridica());
  $arrayCliente[] = $cliente;    

  $cliente = new Cliente(5, "Juca", "juca@email.com", "017.205.300-04", "(53) 2500-0835");
  $cliente->setStars(3);
  $cliente->addEndereco(new Endereco(null,"Rua bababa, 233","Sao Paulo", "SP"));
  $cliente->setCpf('929477304');
  $cliente->setIsjuridica($cliente->isJuridica());
  $arrayCliente[] = $cliente;    

  $cliente = new PessoaJuridica(6,"Restaurante comida quentinha","Comida Quentinha LTDA","(21) 0018-0018");
  $cliente->setStars(5);
  $cliente->addEndereco(new Endereco(null,"avenida brasil, n26","Sao Paulo", "SP"));
  $cliente->addEndereco(new Endereco(true,"rua maria bunitinha, n11","Sao Paulo", "SP"));
  $cliente->setCnpj('08923321267');
  $cliente->setEmail('restaurante@comercio.com.br');
  $cliente->setIsjuridica($cliente->isJuridica());
  $arrayCliente[] = $cliente;

  if(!isset($_GET['ordem'])){
    $ordem = 'asc';
  }else{
    $ordem = $_GET['ordem'];
  }  

  $uri = explode('/',$_SERVER ['REQUEST_URI']);

  array_shift($uri);

  // Imprime na tela
  $conteudo = new Show();

  if((count($uri) > 1) AND ($uri[1] != '')){
    // Mostra conteudo
    $mostraConteudo = $conteudo->geraConteudo($arrayCliente[$uri[1]]);
  }else{
    // Lista
    $mostraConteudo = $conteudo->geraLista($arrayCliente,$ordem);
  }
  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Lista Clientes</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/starter-template.css" rel="stylesheet">
    
    <!-- icones -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">PHP OO</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/clientes">Lista Cliente</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

    <!-- conteudo -->
    <?php print $mostraConteudo; ?>    

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
