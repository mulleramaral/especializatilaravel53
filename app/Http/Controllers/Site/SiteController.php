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
        $title = 'Titulo teste';
        $xss = '<script>alert("Ataque XSS");</script>';
        $var1 = '1243';
        $arrayData = [1,2,3,4,5,6,7,8,9];
        //$arrayData = [];

        return view('site.home.index',compact('title','xss','var1','arrayData'));
    }

    public function contato(){
        return view('site.contato.index');
    }

    public function categoria($id){
        return "Listagem dos posts da categoria: {$id}";
    }

    public function categoriaOp($id = null){
        return "Listagem dos posts da categoria: {$id}";
    }
}
