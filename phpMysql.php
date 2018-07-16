<?php
    /*------------------------------------------------------------------------
     * Created by mclo.
     * Mail: marcelohenrik@gmail.com
     * Github: https://github.com/mathoian 
     * Date: 21/06/18
    ------------------------------------------------------------------------*/
    
    /*
     * PHP 7 + MARIADB(mysql) + Arch linux
     * Exemplo conexão Mysql com PHP
     * Conexão com mysql                (x)
     * inserir aluno no banco           (x)
     * remover aluno no banco           (x)
     * consultar aluno no banco         ( )
     * alterar  aluno no banco          (x)
     * */
    //configuracao de nome e usuario segundo o usuario e senha do SEU mysql
    $servidor = "localhost";
    $usuario = "usuario";
    $senha = "senha";
    $mysqlDB = "ALLOW";
    $query_insert = "insert into aluno (nome,cpf) values ('AMarlon','100.111.300-00')";
    $query_selectAll = "select * from aluno";

    function conn(){
        global $usuario,$senha;
        try {
            //criando conexao - caso seja procedural pode usar "if" no "try catch"
            $conexao = mysqli_connect('localhost', $usuario, $senha, "ALLOW");
            mysqli_select_db($conexao, 'ALLOW');
            mysqli_set_charset($conexao, "utf8");
            if(mysqli_connect_errno()) {
                throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
            }
            return $conexao;
        }catch
            (Exception $e){
                echo "excecao capturada: ", $e->getMessage(), "\n";
            }

    }

    
    function insert(){
        global $conexao,$query_insert;
        mysqli_query(conn(), $query_insert);
    
    }
    function selectAll(){
        global $conexao,$query_selectAll;
        mysqli_query($conexao, $query_selectAll);
    }
    function update($id){
        mysqli_query(conn(), "update aluno set nome = \"Joana Goias Assis\" , cpf = \"077.885.134-122\" where id = $id");
    }
    function delete($id){
        mysqli_query(conn(), "delete from aluno where id = $id");
    }

    conn();
    //insert();
    //update(35);
    //delete(25);
    mysqli_close(conn());
