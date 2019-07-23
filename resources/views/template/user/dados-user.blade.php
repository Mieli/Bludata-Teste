 <!-- Sidebar user panel (optional) -->
 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('') }}" class="img-circle elevation-2" alt="">
    </div>
    <div class="info">
        <a href="{{ url('home') }}" class="d-block">{{ Auth::user()->name }}</a>
    </div>
</div>