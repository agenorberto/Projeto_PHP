<?php

class AlunoDAO{
    
    public function cadastrar(Aluno $aluno) {
        try {
            $sql = "INSERT INTO aluno (                   
                  nome,endereco,email, telefone, idade,sexo)
                  VALUES (
                  :nome,:endereco,:email,:telefone,:idade,:sexo)";

            $conectar = Conexao::getConexao()->prepare($sql);
            $conectar->bindValue(":nome", $aluno->getNome());
            $conectar->bindValue(":endereco", $aluno->getEndereco());
            $conectar->bindValue(":email", $aluno->getEmail());
            $conectar->bindValue(":telefone", $aluno->getTelefone());
            $conectar->bindValue(":idade", $aluno->getIdade());
            $conectar->bindValue(":sexo", $aluno->getSexo());
            
            return $conectar->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir usuario <br>" . $e . '<br>';
        }
    }

    public function mostraAluno() {
        try {
            $sql = "SELECT * FROM aluno";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaAluno($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function alterar(Aluno $aluno) {
        try {
            $sql = "UPDATE aluno set
                
                  nome=:nome,
                  endereco=:endereco,
                  email=:email,
                  telefone=:telefone,
                  idade=:idade,
                  sexo=:sexo    

                  WHERE id = :id";

            $conectar = Conexao::getConexao()->prepare($sql);
            $conectar->bindValue(":nome", $aluno->getNome());
            $conectar->bindValue(":endereco", $aluno->getEndereco());
            $conectar->bindValue(":email", $aluno->getEmail());
            $conectar->bindValue(":telefone", $aluno->getTelefone());
            $conectar->bindValue(":idade", $aluno->getIdade());
            $conectar->bindValue(":sexo", $aluno->getSexo());
            $conectar->bindValue(":id", $aluno->getId());
            return $conectar->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function excluir(Aluno $aluno) {
        try {
            $sql = "DELETE FROM aluno WHERE id = :id";
            $conectar = Conexao::getConexao()->prepare($sql);
            $conectar->bindValue(":id", $aluno->getId());
            return $conectar->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }


    private function listaAluno($row) {
        $aluno = new Aluno();
        $aluno->setId($row['id']);
        $aluno->setNome($row['nome']);
        $aluno->setEndereco($row['endereco']);
        $aluno->setEmail($row['email']);
        $aluno->setTelefone($row['telefone']);
        $aluno->setIdade($row['idade']);
        $aluno->setSexo($row['sexo']);

        return $aluno;
    }
 }

 ?>