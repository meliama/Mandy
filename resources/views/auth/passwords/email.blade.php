@extends('layouts.template')

@section('content')

<div class="page-container login-registro-content">
              <div class="titulo-login">
                  <h3>Olvido de contraseña</h3>
              </div>

                <div class="form-login-registro">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="input-label" >E-Mail:</label>
                            <br>
                                <input class="forgot-password-email"id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" >
                                @if (session('status'))
                                    <div  class="input-label">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if ($errors->has('email'))
                                    <span class="ion-close">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>
                          <button type="submit" class="save-button">
                            Enviar link!
                          </button>
                        </form>
                      </div>
                    </div>




@endsection
