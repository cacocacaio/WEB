<!DOCTYPE HTML>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Exemplo 3: Passagem de Parâmetros</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
    
<body>
    <h1><?php echo $titulo; ?></h1>
    <h3>Controllers -> view</h3>
    <nav>
        <ul>
            <?php foreach($menu as $item): ?>
                <li><?php echo $item; ?></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div>
        <p><?php echo $texto; ?></p>
        <p><?php echo $segmento; ?></p>
    </div>
    <footer>
        <p>&copy; Copyright by Marcelo Mussel</p>
    </footer>
</body>
</html>
