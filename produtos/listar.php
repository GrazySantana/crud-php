<?php
    require_once "../src/funcoes-produtos.php";
    $listaDeProdutos = lerProdutos($conexao);

?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produtos</title>
    </head>
    <body>

        <div class="container">
            <h1>Produtos | SELECT <a href="../index.php"></a></h1>
            <hr>
            <h2>Lendo e carregando todos os produtos</h2>

            <p><a href="inserir.php" style ="color:Blue">Inserir um ovo produto</a></p>
            <hr>
            <div class="produtos">
                
                <?php foreach($listaDeProdutos as $produto) { ?>

                    <article>

                         <!-- <h3><?=$produto['nome']?> </h3> -->

                        <h3><?=$produto['produto']?></h3>

                         <!-- <p><b>Preço: </b> R$ <?=number_format($produto['preco'], 2, ',', '.')?></p> -->


                         <p><b>Quantidade: </b><?=$produto['quantidade']?></p>
                         <p><b>Descrição:</b> <?=$produto['descricao']?></p>

                         <!-- ___________________________________________________________- -->
                         <!-- <p><b>Fabricante:</b> <?=$produto['fabricante_id']?></p> -->
                         <!-- ______________________________________________________________ -->

                         <p><b>Fabricante:</b> <?=$produto['fabricante']?></p>


                            <!-- Link Dinâmico -->
                            <p>
                                <a href="atualizar.php?id=<?=$produto['id']?>" style="color:blue;">Atualizar</a>
                                <a class="excluir" href="excluir.php?id=<?=$produto['id']?>" style="color:red;">Excluir</a>
                            </p>

                            <hr>
                    </article>

               <?php } ?>
            </div>

        </div>

        <!-- Chamando arquivo j para perguntar antes de excluir -->
        <script src="../js/confirm.js"></script>

        
    </body>
    </html>