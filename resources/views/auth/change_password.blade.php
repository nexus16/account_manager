@extends('layouts.app')
@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-danger">
                                    {{session('message')}}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('postChangePasword') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">現在のパスワード</label>

                                    <div class="col-md-6">
                                        <input id="email" type="password" class="form-control" name="password-current" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">新しいパスワード</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password-new" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">新しいパスワード(確認）</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password-confirm" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            保存
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop