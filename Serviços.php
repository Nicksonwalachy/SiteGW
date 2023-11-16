<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="serviço.css">
    <title>Serviços</title>
    
</head>
<body>
        <?php
            try {
                // conexão com o banco
                $usuario = "root";
                $senha = "";
                $pdo = new PDO(
                    "mysql:host=localhost;dbname=ed2",
                    $usuario,
                    $senha
                );
    
                // criar uma consulta ao banco
                $produto = $pdo->query(
                    "SELECT * FROM `produto`;"
                )->fetchAll();
    
                // percorre o array/vetor de alunos
                // exibe na página o id e nome
                // foreach($alunos as $aluno){
                // 	echo($aluno["id"] . "<br>");	
                // 	echo($aluno["nome"] . "<br>");	
                // }
            } catch (Exception $e) {
                echo($e);
            }
            
        ?>
    
    <div class="container">	
    <img src="imagens/estoque.png"width = 500px eight = 50px>
            <div class="margem">
            <a href="create.php" class="animated-button4"> criar novo produto </a>
        </div>
        <br>
            <div class="content">
        <table class="rTable">	
        <thead>
                <tr>
                    
                    <!--<th width "150" border=1px>#</th>-->	
                    <th width "150" border=1px>NOME</th>
                    <th width "150" border=1px>VALOR</th>
                    <th width "150" border=1px>DESCRIÇÃO</th>
                    <th width "150" border=1px></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($produto as $produto): ?>
                    <tr>
                        <!--<td>   //<?//php echo($produto["id"]) ?></td>-->
                        <td>   <?php echo($produto["nome"]) ?></td>
                        <td width = 100px>R$ <?php echo($produto["valor"]) ?></td>
                        <td>   <?php echo($produto["descricao"]) ?></td>
                        <!--botões-->
                        
                        <td width=200px height=50px>
                        <a href="edit.php?produto_id=<?php echo($produto["id"]); ?>" class="animated-button1">Editar</a>
                        <a href="remove.php?produto_id=<?php echo($produto["id"]); ?>"class="animated-button2"> Remover </a>
                        </td>
                    </tr>
                    <!--fim do codigo-->
                <?php endforeach; ?>
            </tbody>
        </table>
                </div>
</body>
</html>