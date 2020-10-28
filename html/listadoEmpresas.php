<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
</head>
<body>
    <h1>Listado de empresas</h1>

    <table>
        <tr><th>Id</th><th>Nombre</th></tr>

        <?php foreach($this->empresas as $e) { ?>
            <tr><td><?= $e['empresa_id'] ?></td> <td><?= $e['name'] ?></td></tr>
        <? } ?>
    </table>
    
</body>
</html>