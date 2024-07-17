<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1><?php echo $titulo; ?></h1>
        <a href="/veiculo/lista">Listar</a>
        <a href="/veiculo/digitarnovo">Novo</a>
    </header>
    <main>
        <h2><?php echo $subtitulo; ?></h2>
        <div>
            <?php echo $conteudo; ?>
        </div>
    </main>
    <footer><p>Rodapé</p></footer>
</body>
</html>