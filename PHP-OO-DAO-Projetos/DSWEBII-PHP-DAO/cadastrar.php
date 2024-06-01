<?php
    include_once __DIR__ . '/Funcionario.php';
    include_once __DIR__ . '/FuncionarioDAO.php';
    
    if(isset($_POST)){
                
        $funcionarioDao = new FuncionarioDAO();
        $funcionario = new Funcionario($_POST);
                        
        $funcionarioDao->inserir($funcionario);
        
        $lista = $funcionarioDao->listar();
        
        foreach ($lista as $funcionario){
            $funcionario = new Funcionario($funcionario);
             echo $funcionario;
        }
        
    }
?>
  
  