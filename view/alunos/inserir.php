<?php

require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErro = "";
$aluno = NULL;

//Receber os dados do formulário

if(isset($_POST['nome'])) {

    //Usuário já clicou no gravar

    $nome        = trim($_POST['nome']) ? trim($_POST['nome']) : null ;
    $idade       = is_numeric($_POST['idade']) ? $_POST['idade'] : null ;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $idCurso     = is_numeric($_POST['curso']) ? $_POST['curso'] : null;;

    //Criar um objeto Aluno para persistí-lo
    $aluno = new Aluno();
    $aluno->setId(0);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);

    if ($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    } else {
        $aluno->setCurso(NULL);
    }
    //print_r($aluno);

    //Chamar o DAO para salvar o objeto Aluno
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    //Redirecionar para o listar
    if (!$erros) {
        
        header("location: listar.php");

    } else {
        $msgErro = implode("<br>", $erros);
        // echo $msgErro;
    }
}


include_once(__DIR__ . "/form.php");
?>