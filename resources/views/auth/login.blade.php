@extends('layouts.app')

@section('content')

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
  <div class="m-grid__item m-grid__item--fluid   m-grid m-grid--desktop m-grid--ver-desktop m-grid--hor-tablet-and-mobile   m-login m-login--6" id="m_login">
    <div class="m-grid__item   m-grid__item--order-tablet-and-mobile-2  m-grid m-grid--hor m-login__aside " style="background-image: url(img//bg/bg-4.jpg);">
      <div class="m-grid__item">
        <div class="m-login__logo">
          <a href="#">
            {{-- <img src="../../../assets/app/media/img//logos/logo-4.png"> --}}
          </a>
        </div>
      </div>
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver">
        <div class="m-grid__item m-grid__item--middle">
          <span class="m-login__title">Testing</span>
          <span class="m-login__subtitle">Welcome</span>
        </div>
      </div>
      <div class="m-grid__item">
        <div class="m-login__info">
          <div class="m-login__section">
            <a href="#" class="m-link">&copy {{ date("Y") }} Testing</a>
          </div>
          <div class="m-login__section">
            <a href="#" class="m-link">Privacy</a>
            <a href="#" class="m-link">Legal</a>
            <a href="#" class="m-link">Contact</a>
          </div>
        </div>
      </div>
    </div>
    <div class="m-grid__item m-grid__item--fluid  m-grid__item--order-tablet-and-mobile-1  m-login__wrapper">

      <!--begin::Head-->
      {{-- <div class="m-login__head">
        <span>Don't have an account?</span>
        <a href="#" class="m-link m--font-danger">Sign Up</a>
      </div> --}}

      <!--end::Head-->

      <!--begin::Body-->
      <div class="m-login__body">

        <!--begin::Signin-->
        <div class="m-login__signin">
          <div class="m-login__title">
            <h3>Sign In</h3>
          </div>

          <!--begin::Form-->
          {!! Form::open(['url' => 'login', 'method' => 'POST', 'class' => 'm-login__form m-form']) !!}
          {{-- <form class="m-login__form m-form" action=""> --}}
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="email" placeholder="Username" name="email" autocomplete="off" value="{{ old('email') }}">
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif

            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          

          <!--end::Form-->

          <!--begin::Action-->
          <div class="m-login__action">
            {{-- <a href="#" class="m-link">
              <span>Forgot Password ?</span>
            </a> --}}
            {{-- <a href="#"> --}}
              <button id="m_login_signin_submit" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>
            {{-- </a> --}}
          </div>
          {{ Form::close() }}

          <!--end::Action-->

          <!--begin::Divider-->
          {{-- <div class="m-login__form-divider">
            <div class="m-divider">
              <span></span>
              <span>OR</span>
              <span></span>
            </div>
          </div> --}}

          <!--end::Divider-->

          <!--begin::Options-->
          {{-- <div class="m-login__options">
            <a href="#" class="btn btn-primary m-btn m-btn--pill  m-btn  m-btn m-btn--icon">
              <span>
                <i class="fab fa-facebook-f"></i>
                <span>Facebook</span>
              </span>
            </a>
            <a href="#" class="btn btn-info m-btn m-btn--pill  m-btn  m-btn m-btn--icon">
              <span>
                <i class="fab fa-twitter"></i>
                <span>Twitter</span>
              </span>
            </a>
            <a href="#" class="btn btn-danger m-btn m-btn--pill  m-btn  m-btn m-btn--icon">
              <span>
                <i class="fab fa-google"></i>
                <span>Google</span>
              </span>
            </a>
          </div> --}}

          <!--end::Options-->
        </div>

        <!--end::Signin-->
      </div>

      <!--end::Body-->
    </div>
  </div>
</div>

<!-- end:: Page -->
@stop