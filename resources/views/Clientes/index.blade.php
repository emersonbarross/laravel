<h1>Clientes:</h1>
<a href="{{route('cliente.create')}}">Cadastrar Novo Cliente</a>
<ul>
    @foreach ($clientes as $c)
    <li> 
        {{$c['id']}} | {{$c['nome']}} |
        <a href="{{route('cliente.edit', $c['id'])}}">Editar</a>
        <a href="{{route('cliente.show', $c['id'])}}">Info</a>
    
        <form action="{{route('cliente.destroy', $c['id'] )}}" method="POST">
            @csrf
            @method("DELETE")
            <input type='submit' value='Deletar'>
        </form>

    </li>
    @endforeach
</ul>