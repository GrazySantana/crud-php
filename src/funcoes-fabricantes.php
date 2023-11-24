<?php
    // Incluir neste ponto o arquivo conecta.php 
    require_once "conecta.php";
    
    // Programar a função lerFabricantes neste ponto 3 references

    function lerFabricantes(PDO $conexao):array {
        // String com o comando SQL
        $sql = "SELECT id, nome FROM fabricantes";
        try {
            // preparação do comando
            $consulta = $conexao->prepare($sql);

            // Execução do comando
            $consulta-execute();

            // capturar os resultados
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die ("erro" .$erro->getMessage());
        }
        return $resultado;
    }
    
    // Inserir um fabricante (PDO - PHP Database Object)
    // Obs void indica que a função não tem retorno "return"

    // Programar a função inserirFabricante neste ponto
    function inserirFabricante(PDO $conexao, string $nome):void {

        // Insere no Banco de dados o valor digitado pelo usuário no formulário armazenado na variável $nome
        // Obs Não é necessário criar paea o ID que é automático

        // :qualquer_coisa -> isso é um named parameter
        $sql = "INSERT INTO fabricantes(nome) VALUES(nome)";
        try {
            $consulta = $conexao->prepare($sql);

            // bindParam('nome do parametro', $variavel_com_valor, constante de verificação)
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->execute();

        } catch (Exception $erro) {
            die("Erro:".$erro->getMessage());
        }
    }
    
    // Programar a função lerUmFabricante neste ponto 1refrerence 
    function lerUmFabricante(PDO $conexao, int $id):array {
        $sql = "SELECT idn nome FROM fabricantes WHERE id = :id";
        try {
            $consulta = $conexao ->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            // Aqui usado fetch porque é apenas 1 fabricante

        }catch (Exception $erro) {
            die("Erro:".$erro->getMessage());
        }
        return $resultado;
    }
    
    // Programar a função atualizarFabricante neste ponto 1reference 
    function atualizarFabricante(PDO $conexao, int $id, string $nome):void {
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
            $consulta->execute();

        } catch (Exception $erro) {
            die("Erro:".$erro->getMessage());
        }
    }
    
    // Programar a função excluirFabricante neste ponto 1reference
    function excluirFabricante(PDO $conexao, int $id):void {
        $sql = "DELETE FROM faricantes WHERE id = :id";
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindParam(':id', PDO::PARAM_INT);
            $consulta->execute();

        } catch (Exception $erro){
            die("Erro:".$erro->getMessage());
        }
    }
    