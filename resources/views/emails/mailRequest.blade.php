@extends('theme.correos')

@section('content')

  <h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">Hola!</h1>

  @if ($mail['solicitud'] == 'aceptado')
    <p>¡Enhorabuena! Su solicitud ha sido <strong>aceptada</strong>.</p>
  @endif

  @if ($mail['solicitud'] == 'rechazado')
    <p>¡Malas noticias! Su solicitud ha sido <strong>rechazada</strong>.</p>
  @endif

@endsection