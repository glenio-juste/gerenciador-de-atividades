<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://yata2.lss.locawebcorp.com.br/f61407fe1a640c61df31c3262c846db090a38de669d78d420ae864c1f4421274" />
    <title>POC PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Barra de navegação -->
    <nav class="navbar navbar-dark bg-dark mb-2">
        <a class="navbar-brand" target="_blank" href="https://nexus.eti.br/">Nexus</a>
        <a class="navbar-brand" target="_blank" href="https://trello.com/b/ZJekmKxy/atividade-de-desenvolvimento">Trello</a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            </li>
        </ul>

    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1><?= $titulo; ?></h1>
        </div>

        <?php if (isset($_SESSION['mensagem'])) : ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
                <?= $_SESSION['mensagem']; ?>
            </div>
        <?php
            unset($_SESSION['mensagem']);
            unset($_SESSION['tipo_mensagem']);
        endif;
        ?>