<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{   
    private $clientes = array(
        ['id'=>1, 'nome'=>'Ademir'],
        ['id'=>2, 'nome'=>'Joao'],
        ['id'=>3, 'nome'=>'Maria'],
        ['id'=>4, 'nome'=>'Aline']
    );

    public function __construct()
    {
        $clientes = session('clientes');
        if(!isset($clientes))
            session(['clientes' => $this->clientes]);
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes'])); // O 'compact' torna os dados da variavel em string para passar para a view. Aula 24
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.create");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // 'Request' pega tudo que foi passado via post para a function
    {
        $clientes = session('clientes');
        $id = end($clientes) ['id'] +1;
        $nome = $request->nome;
        $dados = ["id"=>$id, "nome"=>$nome];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);
        return redirect()->route('cliente.index');

        //dd($dados); //'DD' a princio é pra debugar e mostrar na tela os dados, similar ao vardump().
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes [$index];
        return view('clientes.info', compact(['cliente']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes [$index];
        return view('clientes.edit', compact(['cliente']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes [$index]['nome'] = $request['nome'];
        session(['clientes' => $clientes]);
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1); // O array_splice' apaga dentro da variavel passada no primeiro parametro a variavel do segundo em quantidade passada no terceiro parametro.
        session(['clientes'=>$clientes]);
        return redirect() ->route('cliente.index');
    }

    private function getIndex($id, $clientes)
    {
        $ids = array_column($clientes, 'id'); // O 'array_column' filtra na variavel passada os dados de array passados no segundo parametro.
        $index = array_search($id, $ids); // O 'array_search' procura dentro da variavel o array passado no primeiro parametro.
        return $index;
    }
}
