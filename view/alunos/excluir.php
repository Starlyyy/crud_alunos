<?php 

require_once(__DIR__ . "/../../model/Aluno.php");
require_once(__DIR__ . "/../../controller/AlunoController.php");

$aluno = new Aluno();
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
    //nao
    
    $aluno = $alunoCont->excluir($aluno);
    header("location:listar.php");
    
} else {
    //sim -- o erro nao funciona T-T
    $msgErro = implode("<br>", $aluno);
    // exit;

}
