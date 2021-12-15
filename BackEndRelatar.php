<?php

class Relatar {
    private $pdo;
    public function conexao(){
        $host = "localhost";
        $dbname = "Banco_Projeto_Bullying";
        $user = "root";
        $senha = "";

            try{
                $this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$senha);
            }
            catch(PDOException $e){
                echo "Erro no Banco de Dados: ".$e->getMessage();
            }
            catch(Exception $e) {
                echo "Ocorreu um erro: ".$e->getMessage();
            }
        }

    public function registro_bullying($nome, $sobrenome, $escola, $cidade, $estado, $nome_agressor, $email, $relato, $atendimento) {
        $con = $this->pdo->prepare("INSERT INTO registro (nome,sobrenome,escola,cidade,estado,nome_agressor,email,relato,atendimento) VALUES (:no,:so,:esc,:ci,:est,:na,:em,:re,:at)");
        $con->bindValue(":no",$nome);
        $con->bindValue(":so",$sobrenome);
        $con->bindValue(":esc",$escola);
        $con->bindValue(":ci",$cidade);
        $con->bindValue(":est",$estado);
        $con->bindValue(":na",$nome_agressor);
        $con->bindValue(":em",$email);
        $con->bindValue(":re",$relato);
        $con->bindValue(":at",$atendimento);
        $con->execute();
    }

}
    
?>