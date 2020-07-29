<h1>Clientes:</h1>
<a href='{{route('cliente.create')}}'>Cadastrar Novo Cliente</a>
<ol>
    @foreach ($clientes as $c)
    <li>  {{$c['nome']}} |
    <a href="{{route('cliente.edit', $c['id'])}}">Editar</a>
    </li>
    @endforeach
</ol>