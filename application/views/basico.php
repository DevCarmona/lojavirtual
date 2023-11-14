<html>
    <head>
        <title><?php echo $title;?></title>
    </head>
    <body>
        <h1>Olá, <?php echo $nome;?></h1>

        <ul>
            <?php foreach ($tecnologias as $item): ?>
                <li><?php echo $item;?></li>
            <?php endforeach;?>
        </ul>
    </body>
</html>