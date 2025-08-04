<?php

require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

//Receber os dados do formulário
if(isset($_POST['nome'])) {
    //Usuário já clicou no gravar
    $nome  = trim($_POST['nome']) ? trim($_POST['nome']) : null ;
    $idade = $_POST['idade'];
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $idCurso = $_POST['curso'];

    //Criar um objeto Aluno para persistí-lo
    $aluno = new Aluno();
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);

    $curso = new Curso();
    $curso->setId($idCurso);
    $aluno->setCurso($curso);
    //print_r($aluno);

    //Chamar o DAO para salvar o objeto Aluno
    $alunoCont = new AlunoController();
    $alunoCont->inserir($aluno);

    //Redirecionar para o listar
    header("location: listar.php");
}


include_once(__DIR__ . "/form.php");
?>