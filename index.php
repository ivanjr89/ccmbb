<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

    <title>Sistema Escolar Beatriz Biavatti - Colégio Cívico Militar</title>
        
    </head>
    <body>
        <h3 style="text-align:center; margin-top: 50px;">Sistema Escolar Beatriz Biavatti</h3> 
        <h3 style="text-align:center; margin-top: 10px;" >Colégio Cívico Militar</h3>
    <div style="text-align: center; margin-top: 100px; width: 300px; margin-left: 550px;">

        <form action="logon.php" class="form-group" method="post">
        
        <div>
            <label>Usuário</label>
            <input type="text" name="usuario" autofocus class="form-control"/>
        </div>
        <div>
            <label>Senha</label>
            <input type="password" name="senha" class="form-control"/>
        </div><br>
        <button class="btn btn-success" type="submit">Entrar</button>
        <a class="btn btn-primary" href="cadastroUsuario.php">Criar Usuário</a>
       
        </form>
    </div>
    </body>
</html>