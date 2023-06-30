<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mt-5 mb-4">Login</h1>
                <form action="autenticar.php" method="POST">
                    <div class="form-group">
                        <label for="username">Usuário:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>

                <hr>

                <h4 class="mt-4 mb-3">Criar novo usuário</h4>
                <form action="criar_usuario.php" method="POST">
                    <div class="form-group">
                        <label for="new_username">Novo usuário:</label>
                        <input type="text" class="form-control" name="new_username" id="new_username" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password">Nova senha:</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Criar usuário</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

