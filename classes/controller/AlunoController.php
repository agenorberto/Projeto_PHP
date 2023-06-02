<?php
include_once "../conexao/Conexao.php";
include_once "../model/Aluno.php";
include_once "../dao/AlunoDAO.php";


$aluno = new Aluno();
$alunodao = new AlunoDAO();

//Dados passado pelo POST

$dados = filter_input_array(INPUT_POST);


//Cadastrar
if(isset($_POST['cadastrar'])){

    $aluno->setNome($dados['nome']);
    $aluno->setEndereco($dados['endereco']);
    $aluno->setEmail($dados['email']);
    $aluno->setTelefone($dados['telefone']);
    $aluno->setIdade($dados['idade']);
    $aluno->setSexo($dados['sexo']);

    $alunodao->cadastrar($aluno);

    header("Location: ../../");
} 
// Editar
else if(isset($_POST['editar'])){

    $aluno->setNome($dados['nome']);
    $aluno->setEndereco($dados['endereco']);
    $aluno->setEmail($dados['email']);
    $aluno->setTelefone($dados['telefone']);
    $aluno->setIdade($dados['idade']);
    $aluno->setSexo($dados['sexo']);
    $aluno->setId($dados['id']);

    $alunodao->alterar($aluno);

    header("Location: ../../");
}
// Excluir
else if(isset($_GET['deletar'])){

    $aluno->setId($_GET['deletar']);

    $alunodao->excluir($aluno);

    header("Location: ../../");
}else{
    header("Location: ../../");
}