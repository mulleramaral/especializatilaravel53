<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\Painel\ProductFormRequest;
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
        $title = 'Listagem dos Produtos';
        $products = $this->product->all();
        return view('painel.products.index',compact('products','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Cadastrar Novo Produto';
        $categorys = ['eletronicos','moveis','limpeza','banho'];
        return view('painel.products.create-edit',compact('title','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        //dd($request->all());
        //dd($request->only(['name','number']));
        //dd($request->except(['_token']));
        //dd($request->input('name'));

        //Pega todos os dados que vem do formulário
        $dataForm = $request->all();
        $dataForm['active'] = !isset($dataForm['active']) == '' ? false: true;

        //Valida os dados
        //$this->validate($request,$this->product->rules);


        /*
        $validate = validator($dataForm,$this->product->rules,$messages);

        if($validate->fails()){
            return redirect()
                   ->route('produtos.create')
                   ->withErrors($validate)
                   ->withInput();
        }
        */

        //Faz o cadastro
        $insert = $this->product->create($dataForm);

        if($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');

        return 'Cadastrado';
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
        $product = $this->product->find($id);
        $title = "Editar Produto: {$product->name}";
        $categorys = ['eletronicos','moveis','limpeza','banho'];

        return view('painel.products.create-edit',compact('title','categorys','product'));
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
        return 'update';
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
        /** INSERT */

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

        /* MODE MAIS PRODUTIVO Precisa Especificar quais colunas devem ser preenchidas */
        /*
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

        */

        /** UPDATE **/


        /* Maneira improdutiva
        $prod->name = 'Nome do Produto update';
        $prod->number = 12343456;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'task update';
        $update = $prod->save();
        */

        /*
        $prod = $this->product->find(5);

        $update = $prod->update([
            'name'          => 'Update teste',
            'number'        => 888,
            'active'        => false,
        ]);

        $prod = $this->product->where('number',888)
                              ->update([
                                  'name'   => 'Update teste',
                                  'number' => 123456789,
                                  'active' => true
                              ]);

        if($update)
            return 'Alterado com sucesso 2';
        else
            return 'Falha ao alterar';
        */

        /** DELETE */

        //$this->product->destroy(1);
        //$this->product->destroy([1,2,3,4]);

        $prod = $this->product->find(3);
        $delete = $prod->delete();
        if($delete)
            return 'Deletado com sucesso';
        else
            return 'Falha ao deletar';

    }
}
