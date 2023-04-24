<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./public/style.css">
        <title>Vizualizar Produtos</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="./views/index.html">Home</a></li>
                <li><a href="./views/add.html">Cadastrar Produto</a></li>
                <li><a href="./views/update.html">Editar Produto</a></li>
                <li><a href="./views/remove.html">Remover Produto</a></li>
                <li><a href="./view.php">Vizualizar Produtos</a></li>
            </ul>
        </nav>
        <main>
            <h1>Vizualizar Produtos</h1>
            <?php
            include 'connection.php';
            
            $query = $connection->query('select * from products');
            if ($query->num_rows > 0) {
                $query = $query->fetch_all(MYSQLI_ASSOC);
                echo '<table><tr><th>Id</th><th>Nome</th><th>Descrição</th><th>Quantidade em estoque</th><th>Preço</th><th>Criado em</th><th>Atualizado em</th></tr>';
                foreach ($query as $i) {
                    echo '<tr><td>' . $i['id'] . '</td><td>'
                    . $i['name'] . '</td><td>'
                    . $i['description'] . '</td><td>'
                    . $i['quantity'] . '</td><td>'
                    . $i['price'] . '</td><td>'
                    . $i['created_at'] . '</td><td>'
                    . $i['updated_at'] . '</td></tr>';
                }
                echo '</table>';
            } else {
                echo '<h2>0 results</h2>';
            }
            ?>
        </main>
    </body>
</html>
