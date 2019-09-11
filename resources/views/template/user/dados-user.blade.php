 <!-- Sidebar user panel (optional) -->
 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('') }}" class="img-circle elevation-2" alt="">
    </div>
    <div class="info">
        <a href="{!! route('usuarios.show', Auth::user()->id) !!}" class="d-block">{{ substr(Auth::user()->name, 0, 25)  }} ...</a> 
    </div>
</div>