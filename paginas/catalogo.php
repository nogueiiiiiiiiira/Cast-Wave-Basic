<?php

// inicia a sessão
session_start();

// verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /projetoLocadora/paginas/login.php'); 
    exit();
}

// conexão com o database de dados 
$host = "localhost"; 
$usuario = "root";  
$senha = ""; 
$database = "castwave";  

$conn = new mysqli($host, $usuario, $senha, $database);

// verificação de conexão
if ($conn->connect_error) {
    echo "Falha na conexão: " . $conn->connect_error;
}

// obtém o ID do usuário da sessão
$usuario_id = $_SESSION['usuario_id'];

// consulta SQL para obter o nome do usuário
$sql = "SELECT nome FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);

if ($stmt->execute() === FALSE) {
    echo "Erro na consulta SQL: " . $stmt->error;
    exit();
}

$stmt->bind_result($usuario_nome);
$stmt->fetch();
$stmt->close();
$conn->close();

// caso o nome não seja encontrado
if (!$usuario_nome) {
    $usuario_nome = "Usuário desconhecido";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- importa a font do google -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" /> <!-- importa o CSS do bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" /> <!-- importa o CSS do font awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- importa o JS do bootstrap -->

    <link rel="stylesheet" href="../assets/css/catalogo.css" /> <!-- importa o CSS do catalogo -->
    <script src="../assets/scripts/logout.js"></script> <!-- importa o JS do logout -->
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">        
            <li class="nav-item"><a class="nav-link" href="./catalogo.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="./minha_conta.php">Minha Conta</a></li>
            <li class="nav-item"><a class="nav-link" href="./meus_alugueis.php">Meus Aluguéis</a></li>
            <li class="nav-item"><a class="nav-link" href="./minhas_recomendacoes.php">Minhas Recomendações</a></li>
            <li class="nav-item"><a class="nav-link" href="./logout.php" id="logout">Sair</a></li> 
        </ul>
        </div>
    </div>
    </nav>

    <br>
    <br>

    <h1>CastWave</h1>
    <br>
    <h4>Bem-vindo(a), <?php echo htmlspecialchars($usuario_nome); ?>!</h4> <!-- exibe o nome do usuário -->
        
</body>
</html>