<?php
class ControleVeiculo
{
    public function lista()
    {
        $dao = new DaoVeiculo();
        $lista = $dao->select();
        return json_encode($lista);
    }
    public function novo()
    {
        $fabricante = filter_input(INPUT_POST, "input_fabricante", FILTER_SANITIZE_STRING);
        $modelo = filter_input(INPUT_POST, "input_modelo", FILTER_SANITIZE_STRING);
        $v = new ModeloVeiculo($fabricante, $modelo);
        $dao = new DaoVeiculo();
        if ($dao->insert($v)) {
            return '{"mensagem": "Inclusão realizada!"}';
        } else {
            return '{"mensagem": "Erro ao realizar a inclusão!"}';
        }
    }
    public function exclui()
    {
        $id = filter_input(INPUT_POST, "input_id", FILTER_SANITIZE_NUMBER_INT);
        $dao = new DaoVeiculo();
        if ($dao->delete($id)) {
            return '{"mensagem": "Deleção realizada!"}';
        } else {
            return '{"mensagem": "Erro ao realizar a deleção!"}';
        }
    }
    public function altera()
    {
        $id = filter_input(INPUT_POST, "input_id", FILTER_SANITIZE_NUMBER_INT);
        $fabricante = filter_input(INPUT_POST, "input_fabricante", FILTER_SANITIZE_STRING);
        $modelo = filter_input(INPUT_POST, "input_modelo", FILTER_SANITIZE_STRING);
        $v = new ModeloVeiculo($fabricante, $modelo, $id);
        $dao = new DaoVeiculo();
        if ($dao->update($v)) {
            return '{"mensagem": "Alteração realizada!"}';
        } else {
            return '{"mensagem": "Erro ao realizar a alteração!"}';
        }
    }
}