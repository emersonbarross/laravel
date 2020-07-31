<h3>EDITAR</h3>

<form action = "{{route('cliente.update', $cliente['id'])}}" method="POST"> <!-- Somente é permitido envio de formumario html com os metodos get e post.-->
    
    @csrf <!--necessario pois o 'form' cria um token-->
    
    @method('PUT') <!--Essa função é necessaria pois a rota update precisa do metodo 'PUT' para receber.-->
    
    <input type="text" name='nome' value={{$cliente['nome']}}>
    <input type='submit' value='SALVAR'>
</form>