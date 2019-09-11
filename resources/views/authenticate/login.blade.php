
<!DOCTYPE html>
<html>
<head>
	<title>Bludata - Login </title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">    
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Bludata - Login</h3>
			</div>
			<div class="card-body">
                <form action="{{ route('autenticar') }}" method="post">                
                    
                    @csrf

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="email" class="form-control" placeholder="E-mail">
                     
                    </div>
                    
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="Senha">
                    </div>
                    
					<div class="row align-items-center remember">
						<input name="remember" type="checkbox">Remember Me
                    </div>
                    
					<div class="form-group">
						<input type="submit" value="Entrar" class="btn float-right login_btn">
                    </div>
                    
				</form>
			</div>
						
            @isset($erro)
                <div class="card-footer">
                    <div class="d-flex justify-content-center alert alert-danger">
                        <p>{{ $erro }}</p>
                    </div>
                </div>    
            @endisset
					
		</div>
	</div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>