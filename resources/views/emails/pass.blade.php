@extends('theme.correos')

@section('content')
<div class="container">

  <h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">Enhorabuena!</h1>

  <p>Se ha registrado correctamente.</p>

  <p>Para iniciar sesión, utilice las siguientes credenciales:</p>
  <p>
    <strong>Correo: </strong>{{$mail['email']}}<br>
    <strong>Contraseña: </strong>{{Crypt::decryptString(Auth::user()->token)}}
  </p>
</div>
@endsection