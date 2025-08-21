<?php 

require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$aluno = null;
$msgErro = "";  

//testa se o usuario ja clicou no gravar

if (isset($_POST['nome'])) {
    //ja clicou
    
    //1- capturar os dados do formulario
    
    $id          = $_POST['id'];
    $nome        = trim($_POST['nome']) ? trim($_POST['nome']) : null ;
    $idade       = is_numeric($_POST['idade']) ? $_POST['idade'] : null ;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $idCurso     = is_numeric($_POST['curso']) ? $_POST['curso'] : null;;

    //Criar um objeto Aluno para persistí-lo
    $aluno = new Aluno();
    $aluno->setId($id);
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

    $alunoCont = new AlunoController();
    $erros = $alunoCont->alterar($aluno);

    //Redirecionar para o listar
    if (!$erros) {
        header("location: listar.php");
    } else {
        $msgErro = implode("<br>", $erros);
    }

    //2- chamar o controller para alterar

    // echo "ja clicou, ze";

} else {

    //abriu pra ver o formulario

    $id = 0;
    
    if (isset($_GET['id'])) {
        $id = $_GET["id"];
    }
    
    
    $alunoCont = new AlunoController();
    $aluno = $alunoCont->buscarPorId($id);
    
    if (!$aluno) {
        echo "ID do aluno e invalido!<br>";
        echo "<a href='listar.php'>Voltar</a><br>";
        exit;
    }
    
    // print_r($aluno);
    // exit;
    //abriu a pagina para ver o formulario
}


include_once(__DIR__ . "/form.php");
