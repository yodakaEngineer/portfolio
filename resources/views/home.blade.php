@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div id="example"></div>
                @if (Auth::check())
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                @else
                <div class="panel-heading">Yodaka's Portfolio</div>
                    <div class="panel-body">
                        Welcome to my Portfolio!
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
