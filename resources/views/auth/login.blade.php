@extends('layouts.template.login')

@section('content')
    <section class="login-content">
        <div class="logo">
            <h1>B-STOCK</h1>
        </div>
        <div class="login-box">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="login-head">
                    <i class="fa fa-lg fa-fw fa-user"></i>
         S'authentifier
                </h3>
                <div class="form-group">
                    <label  for="email" class="control-label">Email</label>
                    <input
                            id="email"
                            type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="off"
                            autofocus
                    >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Mot de Passe</label>
                    <input
                            class="form-control @error('password') is-invalid @enderror"
                            type="password"
                            placeholder="Password"
                            name="password"
                            required
                            autocomplete="off"
                    >
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox"><span class="label-text">Rester Connecter</span>
                            </label>
                        </div>
                        <p class="semibold-text mb-2">

                            <a href="{{route('password.request')}}" data-toggle="flip">Mot de passe oublié ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Connecter</button>
                </div>
            </form>
        </div>
    </section>
@endsection
