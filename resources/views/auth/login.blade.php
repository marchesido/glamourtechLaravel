<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a2d9d6d66f.js" crossorigin="anonymous"></script>


    <style>
        body {
            background: #f0f0f0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login .card {
            width: 380px;
            border-radius: 10px;
        }

        .login img {
            width: 140px;
        }

        .card-header {
            text-align: center;
            background: #fff;
            border-bottom: none;
            padding-top: 30px;
        }
    </style>
</head>

<body>

    <div class="login">
        <div class="card shadow">
            <div class="card-header">
                <img src="/imagens/logotransparente.png" alt="Logo">
            </div>

            <div class="card-body">

                {{-- Mensagem de erro de login --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST" data-parsley-validate="">
                    @csrf

                    {{-- EMAIL --}}
                    <label for="email" class="mt-2">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control"
                        required placeholder="Digite um e-mail"
                        data-parsley-required-message="Preencha o e-mail"
                        data-parsley-type-message="Digite um e-mail válido">

                    <br>

                    {{-- SENHA --}}
                    <label for="password">Senha:</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="senha"
                            placeholder="Digite sua senha" required
                            data-parsley-required-message="Digite uma senha"
                            data-parsley-errors-container="#erroSenha">

                        <button class="btn btn-outline-secondary" type="button" onclick="mostrarSenha()">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    <div class="text-end border-secondary pb-1">
                        <a href="{{ route('auth.create') }}">Cadastre-se</a>
                    </div>


                    <div id="erroSenha"></div>

                    {{-- BOTÃO LOGIN --}}
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-check"></i> Fazer login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function mostrarSenha() {
            let campo = document.getElementById('senha');
            campo.type = campo.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>