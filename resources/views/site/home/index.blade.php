@extends('site.template.template')

@section('content')
    <h1>Home page do site</h1>
    {{ $xss }}

    @if($var1 == '123')
        <p>é igual</p>
    @else
        <p>é diferente</p>
    @endif

    @unless( $var1 == '1243')
        <p>Não é igual ... unless</p>
    @endunless

    @for($i = 0;$i < 10;$i++)
        <p>For: {{$i}}</p>
    @endfor

    @foreach($arrayData as $array)
        <p>Foreach: {{$array}}</p>
    @endforeach

    @forelse($arrayData as $array)
        <p>Forelse: {{$array}}</p>
    @empty
        <p>Não existe itens para serem impressos</p>
    @endforelse

@endsection

@push('scripts')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush