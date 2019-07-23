
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Bludata - Login </title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Bludata - Login</h3>
				<div class="d-flex justify-content-end social_icon">
					{{-- <span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span> --}}
				</div>
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
			<div class="card-footer">
				
                    @isset($erro)
                        <div class="d-flex justify-content-center alert alert-danger">
                            <p>{{ $erro }}</p>
                        </div>
                    @endisset
			
				
			</div>
		</div>
	</div>
</div>
</body>
</html>






{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login - Bludata Software</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

       
    </head>
    <body>
    <div id="login">
        {{-- <h3 class="text-center text-white pt-5">Login</h3> 
         <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <h3 class="text-center text-info pt-5 ">Login</h3> 
                        
                            @isset($erro)
                                <div class="alert alert-danger">
                                    <p>{{ $erro }}</p>
                                </div>
                            @endisset
                         
                        
                        {!! Form::open(['route' => 'autenticar', 'method' => 'post', 'class' => 'form-horizontal']) !!}

                           
                            @include('formulario.input',['label' => 'E-mail', 'input' => 'email',  
                                                            'attributes' => [
                                                                'class' => 'form-control input-lg', 
                                                                'placeholder' => '',
                                                                'required'
                                                            ] 
                                                        ])

                            @include('formulario.password', ['label' => 'Senha', 'input' => 'password', 
                                                                'attributes' => [
                                                                    'class' => 'form-control input-lg', 
                                                                    'required'
                                                                ]
                                                            ])

                            @include('formulario.submit', ['name' => 'Entrar',
                                                                'attributes' => [
                                                                    'class' => 'btn btn-danger btn-lg', 
                                                                ]
                                                            ])                                
                
                        {!! Form::close() !!}   
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>

</html> --}}
