## 01 - Criar projeto ##

# Via Laravel Installer #
<code>composer global require "laravel/installer" laravel new blog</code>

# Via Composer #
<code>composer create-project --prefer-dist laravel/laravel blog </code>

# 2 - Gerar Key #
<code>php artisan key:generate</code>

## 02 - ROTAS ##

<pre>
Route::group(['prefix' => 'painel','middleware' => 'auth'],function(){
   Route::get('/users',function (){
        return 'Controle de Users';
    });   
    Route::get('/financeiro',function (){
        return 'Financeiro Painel';
    });
    Route::get('/',function(){
        return 'Dashboard';
    });
});
</pre>

<pre>
Route::get('/login',function(){
    return '#Form Login';
})->name('login');
</pre>

<pre>
Route::get('/categoria2/{id?}',function($id = 1){
   return "posts da categoria {$id}" ;
});
</pre>

<pre>
Route::get('/categoria/{id}/nome-fixo/{prm}',function($id,$prm){
    return "Posts da categoria {$id} - {$prm}";
});
</pre>

<pre>
Route::get('/nome/nome2/nome7',function(){
    return 'Rota grande';
})->name('rota.nomeada');
</pre>

<pre>
Route::any('/any',function(){
    return 'Route Any';
});
</pre>

<pre>
Route::match(['get','post'],'/match',function(){
    return 'Route match';
});
</pre>

<pre>
Route::post('/post',function (){
    return 'Route post';
});
</pre>

<pre>
Route::get('/contato',function(){
    return "Contato";
});
</pre>

<pre>
Route::get('/empresa',function(){
    return view('empresa');
});
</pre>

<pre>
Route::get('/', function () {
    return redirect()->route('rota.nomeada');
});
</pre>

## 03 - CONTROLLERS ##
<pre><code>
php artisan make:controller NomeDoController
php artisan make:controller NameSpace\NomeController
php artisan make:controller NameSpace\NomeController --resource
</code></pre>

## 04 - MIGRATIONS ##
<pre>
01 - para executar o migrate
<code>php artisan migrate</code>
 
02 - Se renomear a migration é necessario fazer o dump autload 
<code>composer dump-autoload</code>
</pre>