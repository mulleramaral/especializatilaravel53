<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function __construct(){
        //$this->middleware('auth');

        /*
        $this->middleware('auth')
             ->only([
                 'index',
                 'contato',
             ]);

        $this->middleware('auth')
            ->except([
                'index',
                'contato'
            ]);
        */
    }

    public function index(){
        return 'Home da Page do Site';
    }

    public function contato(){
        return 'Pagina contato';
    }

    public function categoria($id){
        return "Listagem dos posts da categoria: {$id}";
    }

    public function categoriaOp($id = null){
        return "Listagem dos posts da categoria: {$id}";
    }
}
