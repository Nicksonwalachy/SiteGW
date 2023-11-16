<!DOCTYPE html>
<html lang="pt">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Serviços</title>
</head>
<body>
<?php 
	// validação do tipo da requisição
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		// recupevalorr os dados da requisição
		$nome = '';
		$telefone = '';
		$serviço = '';
        $endereço='';

		// validando campo nome
		if(isset($_POST['nome'])){
			$nome = $_POST['nome'];
		}

		// validando campo telefone
		if(isset($_POST['telefone'])){
			$telefone = $_POST['telefone'];
		}
		
		if(isset($_POST['serviço'])){
			$serviço = $_POST['serviço'];
		}

        if(isset($_POST['endereço'])){
			$endereço = $_POST['endereço'];
		}

		// conexão com o banco
		if(empty($nome) && empty($telefone) && empty($serviço) && empty($endereço)){
			echo("Os campos não podem ser vazios");
			exit();
		}

		// conectando no banco de dados
		$usuario = "root";
		$senha = "";
		$pdo = new PDO(
			"mysql:host=localhost;dbname=serviço",
			$usuario,
			$senha
		);

		// criar o registro na tabela
		$novoserviço = $pdo->prepare(
			"INSERT INTO `serviço`(nome, telefone, serviço, endereço) VALUES(:nome,:telefone,:serviço,:endereço)"
		); // prepavalor a query

		// define as variaveis com os valores
		$novoserviço->bindParam(':nome', $nome);
		$novoserviço->bindParam(':telefone', $telefone);
		$novoserviço->bindParam(':serviço', $serviço);
        $novoserviço->bindParam(':endereço', $endereço);    
		// executar a inserção
		$novoserviço->execute();

		echo("Orçamento solicitado com sucesso!");
	}
?>

<br>
<a href="inicio.html">
  Voltar</a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
