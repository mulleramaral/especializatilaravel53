<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index()
    {
        $products = $this->product->all();
        return view('painel.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testes()
    {
        /* Maneira Improdutiva
        $prod = $this->product;
        $prod->nome = 'Nome do Produto';
        $prod->number = 1231231;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Descrição do Produto';
        $insert = $prod->save();
        */

        /* Prejudica a segurança da aplicação
        $insert = $this->product->insert([
                        'name'          => 'Nome do Produto',
                        'number'        => 434435,
                        'active'        => false,
                        'category'      => 'eletronicos',
                        'description'   => 'Descrição vem aqui'
                    ]);
        */

        /* Precisa Especificar quais colunas devem ser preenchidas */
        $insert = $this->product->create([
            'name'          => 'Nome do Produto',
            'number'        => 434435,
            'active'        => false,
            'category'      => 'eletronicos',
            'description'   => 'Descrição vem aqui'
        ]);


        if($insert)
            return "Inserido com sucesso, ID: {$insert->id}";
        else
            return 'Fala ao inserir';
    }
}
