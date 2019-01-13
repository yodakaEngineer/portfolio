@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header bg-dark text-white">Contact</div>

            <div class="card-body">
                <form method="POST" action="{{ url('/contact/confirm') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-8 offset-md-2">
                        <label for="name" class="col-form-label">Name</label>
                        
                        <div>
                            <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>
    
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-8 offset-md-2">
                        <label for="email" class="col-form-label">E-Mail Address</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }} col-md-8 offset-md-2">
                        <label for="message" class="col-form-label">Message</label>

                        <div>
                            <textarea name="message" class="form-control" rows="5">{{old('message')}}</textarea>

                            @if ($errors->has('message'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-8 offset-md-8">
                            <button type="submit" class="btn btn-primary">
                                Confirm
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
