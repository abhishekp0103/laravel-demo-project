@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                Hello : {{ ucwords(Auth::user()->name) }}
                </div>

                <div class="panel-body">
                    <!--You are logged in!-->
                    
                    <p>Your registration request is pending.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
