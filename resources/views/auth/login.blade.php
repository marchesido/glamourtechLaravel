<!DOCTYPE html>
<html>

<body>
    <h2>Login</h2>

    @if($errors->any())
    <p style="color:red;">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Sair</button>
    </form>

</body>

</html>