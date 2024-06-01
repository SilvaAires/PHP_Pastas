<?php

include_once  __DIR__ . '/../Model/Carro.php';
include_once __DIR__ . '/../Conexao/Conexao.php';
include_once __DIR__ . '/../Rotas/Constantes.php';

class CarroDAO{
	
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function cadastrar() {
        $carro = new Carro($_POST);
        $stmt = $this->conexao->prepare('insert into carros (marca, modelo, anoFabricacao) values (:marca, :modelo, :anoFabricacao)');
        $stmt->bindValue(":marca", $carro->getMarca());
        $stmt->bindValue(":modelo", $carro->getModelo());
        $stmt->bindValue(":anoFabricacao", $carro->getAnoFabricacao());
        if ($stmt->execute()) {
            header("Location: ".HOME."home/cadastroSucesso");
        } else {
            header("Location: ".HOME."home/cadastroErro");
        }
    }

    public function selectTodos() {
        $stmt = $this->conexao->prepare('select * from carros');
        $response = '<div class="col s2"></div><div class="col s10 center-align"><table><thead><tr><th class="center-align">Id</th><th class="center-align">Marca</th><th class="center-align">Modelo</th><th class="center-align">Ano de Fabricação</th><th class="center-align">Editar</th><th class="center-align">Excluir</th></tr></thead><tbody>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $carro = new Carro($linha);
                $response .= "<tr><td class='center-align'>" . $carro->getId() . "</td><td class='center-align'>" . $carro->getMarca() . "</td><td class='center-align'>" . $carro->getModelo() . "</td><td class='center-align'>" . $carro->getAnoFabricacao() . "</td><td class='center-align'><a href='#!' class='blue-text editar' id='" . $carro->getId() . "' onclick='editar(this.id)'><span class='material-icons'>mode_edit</span></a></td><td class='center-align'><a href='#!' class='blue-text excluir' id='" . $carro->getId() . "' onclick='excluir(this.id)'><span class='material-icons'>delete</span></a></td></tr>";
            }
            $response .= "</tbody></table></div>";
            echo $response;
        } else {
            echo "Erro ao Buscar Carros";
        }
    }

    public function selectMarca() {
        $stmt = $this->conexao->prepare('select distinct marca from carros order by marca');
        $response = '<option value="" selected disabled>Selecione a Marca</option>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $carro = new Carro($linha);
                $response .= "<option value='" . $carro->getMarca() . "'>" . $carro->getMarca() . "</option>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Marcas";
        }
    }

    public function selectModelo() {
        $stmt = $this->conexao->prepare('select distinct modelo from carros order by modelo');
        $response = '<option value="" selected disabled>Selecione o Modelo</option>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $carro = new Carro($linha);
                $response .= "<option value='" . $carro->getModelo() . "'>" . $carro->getModelo() . "</option>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Modelos";
        }
    }

    public function selectPorMarca() {
        $marca = $_POST['marca'];
        $stmt = $this->conexao->prepare('select * from carros where marca = :marca');
        $stmt->bindValue(":marca", $marca);
        $response = '<div class="col s2"></div><div class="col s10 center-align"><table><thead><tr><th class="center-align">Id</th><th class="center-align">Marca</th><th class="center-align">Modelo</th><th class="center-align">Ano de Fabricação</th><th class="center-align">Editar</th><th class="center-align">Excluir</th></tr></thead><tbody>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $carro = new Carro($linha);
                $response .= "<tr><td class='center-align'>" . $carro->getId() . "</td><td class='center-align'>" . $carro->getMarca() . "</td><td class='center-align'>" . $carro->getModelo() . "</td><td class='center-align'>" . $carro->getAnoFabricacao() . "</td><td class='center-align'><a href='#!' class='blue-text editar' id='" . $carro->getId() . "' onclick='editar(this.id)'><span class='material-icons'>mode_edit</span></a></td><td class='center-align'><a href='#!' class='blue-text excluir' id='" . $carro->getId() . "' onclick='excluir(this.id)'><span class='material-icons'>delete</span></a></td></tr>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Carros";
        }
    }

    public function selectPorModelo() {
        $modelo = $_POST['modelo'];
        $stmt = $this->conexao->prepare('select * from carros where modelo = :modelo');
        $stmt->bindValue(":modelo", $modelo);
        $response = '<div class="col s2"></div><div class="col s10 center-align"><table><thead><tr><th class="center-align">Id</th><th class="center-align">Marca</th><th class="center-align">Modelo</th><th class="center-align">Ano de Fabricação</th><th class="center-align">Editar</th><th class="center-align">Excluir</th></tr></thead><tbody>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $carro = new Carro($linha);
                $response .= "<tr><td class='center-align'>" . $carro->getId() . "</td><td class='center-align'>" . $carro->getMarca() . "</td><td class='center-align'>" . $carro->getModelo() . "</td><td class='center-align'>" . $carro->getAnoFabricacao() . "</td><td class='center-align'><a href='#!' class='blue-text editar' id='" . $carro->getId() . "' onclick='editar(this.id)'><span class='material-icons'>mode_edit</span></a></td><td class='center-align'><a href='#!' class='blue-text excluir' id='" . $carro->getId() . "' onclick='excluir(this.id)'><span class='material-icons'>delete</span></a></td></tr>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Carros";
        }
    }

    public function selectPorId($id) {
        $stmt = $this->conexao->prepare('select * from carros where id = :id');
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function editar() {
        $carro = new Carro($_POST);
        $stmt = $this->conexao->prepare('update carros set marca = :marca, modelo = :modelo, anoFabricacao = :anoFabricacao where id = :id');
        $stmt->bindValue(':marca', $carro->getMarca());
        $stmt->bindValue(':modelo', $carro->getModelo());
        $stmt->bindValue(':anoFabricacao', $carro->getAnoFabricacao());
        $stmt->bindValue(':id', $carro->getId());
        $stmt->execute();    
        if ($stmt->rowCount()) {
            header("Location: ".HOME."home/editSucesso");
        } else {
            header("Location: ".HOME."home/editErro");
        }
    }

    public function remover($id) {
        $stmt = $this->conexao->prepare('delete from carros where id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();        
        if ($stmt->rowCount()) {
            header("Location: ".HOME."home/deleteSucesso");            
        } else {
            header("Location: ".HOME."home/deleteErro");
        }
    }
}