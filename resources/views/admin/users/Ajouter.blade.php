@extends('layouts.template.dashboard')
@section('page')
    Ajout de permissions
@endsection
@section('Description')
    Assigner des rôles et permisssions
@endsection
@section('content')

        @push('extra-css')

        <link rel="stylesheet" href="{{asset('css/multiple-select.css')}}">
        <link rel="stylesheet" href="{{asset('css/multiple-select.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @endpush

    <div class="row">
        <div class="pull-left">
            {!! form($form) !!}
        </div>
        @push('extra-script')
    <script type="text/javascript" src="{{asset('js/multiple-select.js')}}"></script>

    <script>
        $(function() {
            $('select').multipleSelect({
                filter: true,
                filterPlaceholder: 'The filter placeholder'
            })
        })
    </script>
    </div>
    @endpush



@endsection