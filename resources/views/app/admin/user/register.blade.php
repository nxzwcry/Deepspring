@extends('app.layout.frame')

@section('content')
    <div class="wrapper">
        <div class="container w-xxl w-auto-xs">
            <div class="m-b-lg">
                <form name="form" class="form-horizontal form-validation" role="form" method="POST" action="{{ url('/admin/register') }}">
                {!! csrf_field() !!}
                @if (!empty($errors))
                    <div class="text-danger wrapper text-center">
                        {{$errors->first()}}
                    </div>
                @endif
                <div class="list-group list-group-sm">
                    <div class="list-group-item">
                        <input type="text" placeholder="Name" class="form-control no-border" name="name"
                               value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="list-group-item">
                        <input type="email" placeholder="Email" class="form-control no-border" name="email"
                               value="{{ old('email') }}" required>
                    </div>
                    {{--<div class="list-group-item">--}}
                        {{--<input type="password" placeholder="Password" class="form-control no-border" name="password"--}}
                               {{--required>--}}
                    {{--</div>--}}
                    {{--<div class="list-group-item">--}}
                        {{--<input type="password" placeholder="Confirm Password" class="form-control no-border"--}}
                               {{--name="password_confirmation"--}}
                               {{--required>--}}
                    {{--</div>--}}
                </div>
                {{--<div class="m-b-md">--}}
                    {{--<div class="checkbox m-t-none">--}}
                        {{--<label class="i-checks">--}}
                            {{--<input type="checkbox" ng-model="agree" required><i></i> Agree the <a href>terms and policy</a>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    新增用户
                </button>

            </form>
            </div>
        </div>
    </div>
@endsection