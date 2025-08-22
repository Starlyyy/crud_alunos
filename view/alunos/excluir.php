<?php 

// require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

// $aluno = new Aluno();
$msgErro = "";  

//receber o id

$id = 0;

if (isset($_GET['id'])) {
    $id = $_GET["id"];
}

//chamar controller

$alunoCont = new AlunoController();
$aluno = $alunoCont->buscarPorId($id);

//deu erro?
if ($aluno) {
    
    $erros = $alunoCont->excluir($aluno);
    
    // erro
    if ($erros) {
        $msgErro = implode("<br>", $erros);
        echo $msgErro;
    } else {
        header("location:listar.php");
        exit;
    }
    
} else {
    

}
