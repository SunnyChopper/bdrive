@extends('layouts.app')

@section('content')
    @include('layouts.banner')
    <div class="container mt-64 mb-64">
        <div class="row justify-content-center">
            <div class="col-lg-7 order-lg-1 col-md-7 order-md-1 col-sm-12 order-sm-2 col-12 order-2">
                <h2 class="text-center-mobile mb-32 mt-32-mobile">What You Get By Joining Today</h2>
                <hr class="d-md-none">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="image-box-edge">
                            <div class="image-box-image set-bg" data-setbg="https://teaching.temple.edu/sites/tlc/files/styles/featured_image/public/edvice/e-learning2.png?itok=5k8XlikG&c=2ce558713a25e2f5d90f8c11f8047eff"></div>
                            <div class="image-box-info">
                                <h5>Free Intro Course</h5>
                                <p>Not sure if you want to start an Instagram business? Not sure how to start one? Take our free intro course and learn the overall strategy and plan behind an Instagram business.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="image-box-edge">
                            <div class="image-box-image set-bg" data-setbg="https://images.idgesg.net/images/article/2017/10/wireless_network_internet_of_things_iot_thinkstock_853701554-100739367-large.jpg"></div>
                            <div class="image-box-info">
                                <h5>Free Downloadables</h5>
                                <p>As a member, you get unlimited access to resources that will help you build your tech business. Downloadables like cheat sheets, how-to guides, lists, etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="image-box-edge">
                            <div class="image-box-image set-bg" data-setbg="https://ontargetinteractive.com/wp-content/uploads/2012/03/content.png"></div>
                            <div class="image-box-info">
                                <h5>ContentBank&trade;</h5>
                                <p>As a member, you get unlimited access to resources that will help you build your tech business. Downloadables like cheat sheets, how-to guides, lists, etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="image-box-edge">
                            <div class="image-box-image set-bg" data-setbg="http://culturalbrilliance.com/wp-content/uploads/2016/11/community-144653342.jpg"></div>
                            <div class="image-box-info">
                                <h5>Community</h5>
                                <p>Being around like-minded people shouldn't cost money. Not only do you get access to our on-site community, get access to our private Facebook group.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 order-lg-2 col-md-5 order-md-2 col-sm-12 order-sm-1 col-12 order-1 mt-64-desktop">
                <div class="gray-box">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="first_name">{{ __('First Name:') }}</label>
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="last_name">{{ __('Last Name:') }}</label>
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="username">{{ __('Username:') }}</label>
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                

                                <div class="col-12">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password">{{ __('Password:') }}</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                

                                <div class="col-12">
                                    <label for="password-confirm">{{ __('Confirm Password:') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
                                    <button type="submit" class="btn btn-primary center-button">
                                        {{ __('Register') }}
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
