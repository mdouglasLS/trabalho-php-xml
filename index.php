<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Horóscopo</title>

    <style>
      body{
        background-image: url('https://cdn.hovia.com/app/uploads/horoscope-signs-zodiac-wallpaper-mural-Plain.jpg');
        background-attachment: fixed;
        background-size: 100%;
      }

      .max-w{
        min-width: 550px;
        max-width: 800px;
      }

      .btn{
        background: rgb(0,19,26);
        background: linear-gradient(90deg, rgba(0,19,26,1) 0%, rgba(1,67,88,1) 56%, rgba(2,87,92,1) 100%);
        color: #fff;
      }

      .btn:hover{
        background: rgb(0,36,50);
        background: linear-gradient(90deg, rgba(0,36,50,1) 0%, rgba(2,89,117,1) 56%, rgba(5,119,126,1) 100%);
        color: #fff;
      }
    </style>

  </head>
  <body class="p-5">
    
    <div style="opacity: 98%;" class="max-w position-absolute top-50 start-50 translate-middle bg-white rounded shadow p-5">
        <div class="">
          <h1 class="text-center mb-4">Qual o seu sígno?</h1>
          <hr>
          <form action="signo.php" method="get">
              <div class="mt-5 mx-auto">
                  <div class="form-floating mb-4">
                      <input class="form-control" type="text" name="nome"
                      id="nome" placeholder="Seu nome" required>
                      <label for="nome">Seu nome</label>
                  </div>
                  <div class="form-floating mb-4">
                      <input class="form-control" type="date" name="dataUsuario" id="dataUsuario" required>
                      <label for="dataUsuario">Sua data de nascimento</label>
                  </div>
                  <button class="btn w-100 p-3" type="submit">Enviar</button>
              </div>
          </form>
        </div>
    </div>
    
  </body>
</html>