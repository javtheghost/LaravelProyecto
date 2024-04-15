@extends('layouts.app')



@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">x

<style>
 @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
*
{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Quicksand', sans-serif;
}
body
{
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background: #000;
}
section
{
	position: absolute;
	width: 100vw;
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 2px;
	flex-wrap: wrap;
	overflow: hidden;
}
section::before
{
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	background: linear-gradient(#000,#0f0,#000);
	animation: animate 5s linear infinite;
}
@keyframes animate
{
	0%
	{
		transform: translateY(-100%);
	}
	100%
	{
		transform: translateY(100%);
	}
}
section span
{
	position: relative;
	display: block;
	width: calc(6.25vw - 2px);
	height: calc(6.25vw - 2px);
	background: #181818;
	z-index: 2;
	transition: 1.5s;
}
section span:hover
{
	background: #0f0;
	transition: 0s;
}

section .signin
{
	position: absolute;
	width: 400px;
  background: #222;
	z-index: 1000;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 40px;
	border-radius: 4px;
	box-shadow: 0 15px 35px rgba(0,0,0,9);
}
section .signin .content
{
	position: relative;
	width: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	gap: 40px;
}
section .signin .content h2
{
	font-size: 2em;
	color: #0f0;
	text-transform: uppercase;
}
section .signin .content .form
{
	width: 100%;
	display: flex;
	flex-direction: column;
	gap: 25px;
}
section .signin .content .form .inputBox
{
	position: relative;
	width: 100%;
}
section .signin .content .form .inputBox input
{
	position: relative;
	width: 100%;
	background: #333;
	border: none;
	outline: none;
	padding: 25px 10px 7.5px;
	border-radius: 4px;
	color: #fff;
	font-weight: 500;
	font-size: 1em;
}
section .signin .content .form .inputBox i
{
	position: absolute;
	left: 0;
	padding: 15px 10px;
	font-style: normal;
	color: #aaa;
	transition: 0.5s;
	pointer-events: none;
}
.signin .content .form .inputBox input:focus ~ i,
.signin .content .form .inputBox input:valid ~ i
{
	transform: translateY(-7.5px);
	font-size: 0.8em;
	color: #fff;
}
.signin .content .form .links
{
	position: relative;
	width: 100%;
	display: flex;
	justify-content: space-between;
}
.signin .content .form .links a
{
	color: #fff;
	text-decoration: none;
}
.signin .content .form .links a:nth-child(2)
{
	color: #0f0;
	font-weight: 600;
}
.signin .content .form .inputBox input[type="submit"]
{
	padding: 10px;
	background: #0f0;
	color: #000;
	font-weight: 600;
	font-size: 1.35em;
	letter-spacing: 0.05em;
	cursor: pointer;
}
input[type="submit"]:active
{
	opacity: 0.6;
}
@media (max-width: 900px)
{
	section span
	{
		width: calc(10vw - 2px);
		height: calc(10vw - 2px);
	}
}
@media (max-width: 600px)
{
	section span
	{
		width: calc(20vw - 2px);
		height: calc(20vw - 2px);
	}
}

</style>



<section>



    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>

    <div class="signin">
        <div class="content">
            <h2>Iniciar Sesión</h2>
            <form class="form" method="POST" action="">
                @csrf
                <div class="inputBox">
                    <input  id="email" name="email" type="email" required>
                    <i>Correó Electrónico</i>
                </div>
                <div class="inputBox">
                    <input id="password" name="password" type="password" required>
                    <i>Contraseña</i>
                </div>
                <div class="links">
                    <a href="{{route('register.index')}}">Registrarse aquí</a>
                </div>

                @error('message')
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                text-red-600 p-2 my-2">* {{ $message }}</p>
                @enderror

                <div class="form-group mt-3">
                  {!! NoCaptcha::renderJs('es', false, 'onLoadCallback') !!}
                  {!! NoCaptcha::display() !!}
                </div>
                @if($errors->has('g-recaptcha-response'))
                <p class="border border-red-500 rounded-md bg-red-100 w-full
                  text-red-600 p-2 my-2">
                  * {{ $errors->first('g-recaptcha-response') }}
                </p>
                @endif

                <div class="inputBox">
                    <input type="submit" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </div>
</section>













<!-- <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200
rounded-lg shadow-lg">

  <h1 class="text-3xl text-center font-bold">Login</h1>

  <form class="mt-4" method="POST" action="">
    @csrf

    <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email"
    id="email" name="email">

    <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password"
    id="password" name="password">

    @error('message')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">* {{ $message }}</p>
    @enderror

    <div class="form-group mt-3">
      {!! NoCaptcha::renderJs('es', false, 'onLoadCallback') !!}
      {!! NoCaptcha::display() !!}
    </div>
    @if($errors->has('g-recaptcha-response'))
    <p class="border border-red-500 rounded-md bg-red-100 w-full
        text-red-600 p-2 my-2">
        * {{ $errors->first('g-recaptcha-response') }}
    </p>
    @endif
    <button type="submit" class="rounded-md bg-blue-500 w-full text-lg
    text-white font-semibold p-2 my-3 hover:bg-blue-600">Iniciar</button>


  </form>


</div> -->
@endsection

<script>
  var onLoadCallback = function() {
    alert('recaptcha is ready')
  };
</script>
