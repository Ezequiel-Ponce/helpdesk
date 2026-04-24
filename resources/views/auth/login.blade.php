@section('auth_body')

<form action="{{ route('login.post') }}" method="POST">
    @csrf

    <div class="input-group mb-3">
        <input type="email"
               name="email"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="Correo"
               value="{{ old('email') }}"
               required>

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>

    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror

    <div class="input-group mb-3 mt-2">
        <input type="password"
               name="password"
               class="form-control"
               placeholder="Contraseña"
               required>

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Recordarme</label>
            </div>
        </div>

        <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">
                Entrar
            </button>
        </div>
    </div>

</form>

@stop