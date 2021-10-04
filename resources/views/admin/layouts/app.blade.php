<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/app.css" rel="stylesheet" >
    <link href="css/main.css" rel="stylesheet" >
    {{-- Ajax --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <title>ProjectPiloto</title>
  </head>
  <body>
    @yield('conteudo')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/app.js"></script>
    <script>
        $('#enviar').ready(function(){
          $('.toast').toast('show');
        });
        </script>
  </body>
</html>
