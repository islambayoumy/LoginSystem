@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Timeline</div>

                <div class="panel-body">
                    Welcome <b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</b><br/>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
