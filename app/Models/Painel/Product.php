<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** Indica quais campos podem ser preenchidos **/
    protected $fillable = [
        'name','number','active','category','description'
    ];
    //protected $guarded = ['admin'];
}
