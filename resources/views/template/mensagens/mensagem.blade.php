@if(session('mensagem-success'))
    <div class="alert alert-success">
        <p>{{ session('mensagem-success') }}</p>
    </div>
@elseif(session('mensagem-danger'))
    <div class="alert alert-danger">
        <p>{{ session('mensagem-danger') }}</p>
    </div>
@endif