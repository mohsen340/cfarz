@extends('layouts.appT')

@section('content')

                    <form id="form" class="m-t-30 m-b-30"  action="{{ route('login') }}" method="POST" role="form">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="sr-only">رایانامه</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-envelope"></i>
                                    </span>
                                <input id="email" type="email" class="form-control ltr text-left" placeholder="ایمیل" name="email" value="{{ old('email') }}" required autofocus>

                            </div><!-- /.input-group -->
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div><!-- /.form-group -->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="sr-only">رمز عبور</label>
                            <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-key"></i>
                                    </span>
                                <input id="password" type="password" class="form-control  ltr text-left" placeholder="رمز عبور" name="password" required>


                            </div><!-- /.input-group -->
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div><!-- /.form-group -->

                        <button class="btn btn-info btn-round btn-block" type="submit">
                            <i class="icon-paper-plane font-lg"></i>
                            ورود
                        </button>

                    </form>


@endsection
