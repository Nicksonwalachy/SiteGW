<!DOCTYPE html>
<html lang="pt">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    "mysql:host=localhost;dbname=serviço",
                    $usuario,
                    $senha
                );
    
                // criar uma consulta ao banco
                $serviço = $pdo->query(
                    "SELECT * FROM `Solicitação`;"
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
            <div>
            <a href="create.php"> Solicitar Orçamento </a>
        </div>
        <br>
            <div>
        <table>	
        <thead>
                <tr>
                    
                    <!--<th width "150" border=1px>#</th>-->	
                    <th width "150" border=1px>NOME</th>
                    <th width "150" border=1px>TELEFONE</th>
                    <th width "150" border=1px>SERVIÇO</th>
                    <th width "150" border=1px>ENDEREÇO</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($serviço as $serviço): ?>
                    <tr>
                        <!--<td>   //<?//php echo($serviço["id"]) ?></td>-->
                        <td>   <?php echo($serviço["nome"]) ?></td>
                        <td width = 100px>R$ <?php echo($serviço["telefone"]) ?></td>
                        <td>   <?php echo($serviço["serviço"]) ?></td>
                        <!--botões-->
                        
                        <td width=200px height=50px>
                        <a href="edit.php?ser$serviço_id=<?php echo($serviço["id"]); ?>">Editar</a>
                        <a href="remove.php?ser$serviço_id=<?php echo($serviço["id"]); ?>"> Remover </a>
                        </td>
                    </tr>
                    <!--fim do codigo-->
                <?php endforeach; ?>
            </tbody>
        </table>
                </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>