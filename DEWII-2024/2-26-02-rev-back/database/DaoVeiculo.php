<?php

class DaoVeiculo
{
    public function select(){
        $sql = "select * from veiculos;";
        $pst = Conexao::getPrepareStatement($sql);
        if (!$pst) {
            exit("Erro ao preparar");
        }
        $pst->execute();
        $result = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert(ModeloVeiculo $v) {
        $sql = "insert into veiculos (fabricante, modelo) values (?,?);";
        $pst = Conexao::getConnection()->prepare($sql);
        $pst->bindValue(1, $v->getFabricante(), PDO::PARAM_STR);
        $pst->bindValue(2, $v->getModelo(), PDO::PARAM_STR);
        if($pst->execute()){
            // echo $pst->errorInfo();
            return true;
        }
        return false;
    }

    public function delete($id) {
        $sql = "delete from veiculos where id = ?;";
        $pst = Conexao::getConnection()->prepare($sql);
        $pst->bindValue(1, $id, PDO::PARAM_INT);
        if($pst->execute()){
            return true;
        }
        return false;
    }

    public function update(ModeloVeiculo $v) {
        $sql = "update veiculos set fabricante = ?, modelo = ? where id = ?;";
        $pst = Conexao::getConnection()->prepare($sql);
        $pst->bindValue(1, $v->getFabricante(), PDO::PARAM_STR);
        $pst->bindValue(2, $v->getModelo(), PDO::PARAM_STR);
        $pst->bindValue(3, $v->getCodigo(), PDO::PARAM_INT);
        if($pst->execute()){
            return true;
        }
        return false;
    }
}
