
@extends('layouts.template.dashboard)
@section('content')
<section class="lockscreen-content">
    <div class="logo">
        <h1>B-STOCK</h1>
    </div>
    <div class="lock-box"><img class="rounded-circle user-image" src="IMG-20180714-WA0002.jpg">
        <h4 class="text-center user-name">IAI-TOGO</h4>
        <p class="text-center text-muted">Verrouiller la section</p>
        <form class="unlock-form" action="{{route('verrouiller')}}">
            <div class="form-group">
                <label class="control-label">Mot de passe</label>
                <input class="form-control" type="password" placeholder="Password" autofocus>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-unlock fa-lg"></i>Deverrouiller </button>
            </div>
        </form>
    </div>
</section>
    @endsection