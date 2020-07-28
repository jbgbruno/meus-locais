<?php

namespace src\controllers;

use \core\Controller;
use src\models\Locai;

class LocalController extends Controller
{

    public function index()
    {
        $locais = Locai::select()->get();

        $this->render('inicio', ['locais' => $locais]);
    }

    public function create()
    {
        $this->render('cadastro');
    }
    public function store()
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $cep = filter_input(INPUT_POST, 'cep');
        $logradouro = filter_input(INPUT_POST, 'logradouro');
        $complemento  = filter_input(INPUT_POST, 'complemento');
        $numero  = filter_input(INPUT_POST, 'numero');
        $bairro  = filter_input(INPUT_POST, 'bairro');
        $uf = filter_input(INPUT_POST, 'uf');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $data = filter_input(INPUT_POST, 'data');


        $dados = [
            'nome' => $nome,
            'cep' => str_replace("-", "", $cep),
            'logradouro' => $logradouro,
            'complemento' => $complemento,
            'numero' => $numero,
            'bairro' => $bairro,
            'uf' => strtoupper($uf),
            'cidade' => $cidade,
            'data' => (new \DateTime($data))->format("Y-m-d")
        ];
        // var_dump($dados);
        // die();

        if (!empty($nome) || !empty($cep)) {
            Locai::insert($dados)->execute();
        }


        $this->redirect('/');
    }
    public function edit($args)
    {
        $dados = Locai::select()
            ->where('id', $args['id'])
            ->first();
        //  var_dump($dados);
        $this->render('edit', ['dados' => $dados]);
    }
    public function update($args)
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $cep = filter_input(INPUT_POST, 'cep');
        $logradouro = filter_input(INPUT_POST, 'logradouro');
        $complemento  = filter_input(INPUT_POST, 'complemento');
        $numero  = filter_input(INPUT_POST, 'numero');
        $bairro  = filter_input(INPUT_POST, 'bairro');
        $uf = filter_input(INPUT_POST, 'uf');
        $cidade = filter_input(INPUT_POST, 'cidade');
        $data = filter_input(INPUT_POST, 'data');

        $dados = [
            'nome' => $nome,
            'cep' => str_replace("-", "", $cep),
            'logradouro' => $logradouro,
            'complemento' => $complemento,
            'numero' => $numero,
            'bairro' => $bairro,
            'uf' => strtoupper($uf),
            'cidade' => $cidade,
            'data' => (new \DateTime($data))->format("Y-m-d")
        ];

        if (!empty($nome) || !empty($cep)) {
            $local = Locai::select()
                ->where('id', $args['id'])
                ->first();
            // var_dump($local);
            //  die();
            if (!empty($local)) {
                Locai::update()
                    ->set($dados)
                    ->where('id', $args['id'])
                    ->execute();
            }
        }

        $this->redirect('/');
    }
    public function delete($args)
    {
        $id = (int) $args['id'];
        Locai::delete()->where('id', $id)->execute();
        $this->redirect('/');
    }

    public function buscarCep($args)
    {
        $class = new \Jarouche\ViaCEP\BuscaViaCEPJSONP();
        $result = $class->retornaCEP($args['cep']);
        echo (json_encode($result));
    }
}
