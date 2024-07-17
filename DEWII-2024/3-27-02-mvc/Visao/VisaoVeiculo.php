<?php
namespace Crud\Visao;

final class VisaoVeiculo
{
    function mostrarLista($lista) {
        $titulo = 'Veículos';
        $subtitulo  = 'Listagem';
        $dadosTabela = '';
        foreach ($lista as $linha){
            $dadosTabela.= '<tr>';
            $dadosTabela.= '<td>'. $linha['id']. '</td>';
            $dadosTabela.= '<td>'. $linha['fabricante']. '</td>';
            $dadosTabela.= '<td>'. $linha['modelo']. '</td>';

            $dadosTabela.= '<td>';
            $dadosTabela.= '<form action="/veiculo/exclui" method="post">';
            $dadosTabela.= '<input type="hidden" name="input_id" value="' .$linha['id'] .'">';
            $dadosTabela.= '<button>Excluir</button>';
            $dadosTabela.= '</form>';
            $dadosTabela.= '</td>';

            $dadosTabela.= '<td>';
            $dadosTabela.= '<form action="/veiculo/digitarEdicao" method="post">';
            $dadosTabela.= '<input type="hidden" name="input_id" value="' .$linha['id'] .'">';
            $dadosTabela.= '<button>Editar</button>';
            $dadosTabela.= '</form>';
            $dadosTabela.= '</td>';
            
            $dadosTabela.= '</tr>';
        } 
        $fragmento = file_get_contents(__DIR__ . './template/fragmentos/tabela.html');
        $conteudo = str_replace('{{tbody}}', $dadosTabela, $fragmento);
        require_once __DIR__ . '/template/main.php';
    }

    function mostrarFormCadastro(){
        $titulo = 'Veículos';
        $subtitulo  = 'Cadastro';
        $form = file_get_contents(__DIR__ . '/template/fragmentos/form.html');
        $form = str_replace(
            ['{{act}}','{{id}}', '{{fab}}', '{{mod}}'],
            ['/veiculo/novo', '', '', ''],
            $form
        );
        $conteudo = $form;
        require_once __DIR__. '/template/main.php';
    }

    function mostrarFormEdicao($dados){
        $titulo = 'Veículos';
        $subtitulo  = 'Edição';
        $form = file_get_contents(__DIR__ . '/template/fragmentos/form.html');
        $form = str_replace(
            ['{{act}}','{{id}}', '{{fab}}', '{{mod}}'],
            ['/veiculo/altera',
             $dados['id'],
             $dados['fabricante'],
             $dados['modelo'],
            ],
            $form
        );
        $conteudo = $form;
        require_once __DIR__. '/template/main.php';
    }

    function mostrarMensagem($tit, $sub, $msg){
        $titulo = $tit;
        $subtitulo = $sub;
        $conteudo = $msg;
        require_once __DIR__. '/template/main.php';
    }
}