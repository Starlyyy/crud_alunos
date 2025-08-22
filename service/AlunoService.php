<?php 

require_once (__DIR__ . "/../model/Aluno.php");

class AlunoService {

    public function validarAluno(Aluno $aluno){
        $erros = [];

        if($aluno->getNome() == NULL) {
            array_push($erros, "Informe o nome do aluno!");
        }
        
        if($aluno->getIdade() == NULL) {
            array_push($erros, "Informe a idade do aluno!");
        }
        
        if($aluno->getEstrangeiro() == NULL) {
            array_push($erros, "Informe a nacionalidade do aluno!");
        }
        
        if($aluno->getCurso() == NULL) {
            array_push($erros, "Informe o curso do aluno!!");
        }

        return $erros;
    }


}