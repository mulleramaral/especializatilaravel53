@extends('painel.template.template');

@section('content')

    <h1 class="title-pg">Gestão dos Produtos</h1>

    @if( isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form class="form" method="post" action="{{route('produtos.store')}}">

        {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="active">
                <input type="checkbox" name="active" value="1">
                Ativo?
            </label>
        </div>

        <div class="form-group">
            <input type="text" name="number" placeholder="Número:" class="form-control" value="{{old('number')}}">
        </div>

        <div class="form-group">
            <select name="category" class="form-control">
                <option>Escolha a Categoria</option>
                @foreach($categorys as $category)
                    <option value="{{$category}}">{{$category}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <textarea name="description" placeholder="Descrição" class="form-control">{{old('description')}}</textarea>
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>
@endsection
