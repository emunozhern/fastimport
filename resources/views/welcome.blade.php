@section('before_head')
    <style>
        .show {
            padding-right: 17px;
            display: block;
        }

    </style>
    <script>
        function mainModals() {
            return {
                showLogin: false,
                showRegister: false,
            }
        }

    </script>
@endsection

@section('modals')
    <!-- User Register Modal -->
    <div class="modal account-modal fade" :class="{'show': showRegister === true }" id="user-register">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="close" @click="showRegister = !showRegister">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login-header">
                        <h3>Join as a User</h3>
                    </div>

                    <!-- Register Form -->
                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $parent_id }}">
                        <div class="form-group form-focus">
                            <label class="focus-label">{{ __('Name') }}</label>
                            <input class="form-control" type="text" name="name" required autofocus autocomplete="name" />
                        </div>
                        <div class="form-group form-focus">
                            <label class="focus-label">{{ __('Email') }}</label>
                            <input class="form-control" type="email" name="email" required />
                        </div>
                        <div class="form-group form-focus">
                            <label class="focus-label">{{ __('Password') }}</label>
                            <input type="password" name="password" required autocomplete="new-password" class="form-control"
                                placeholder="********" />
                        </div>
                        <div class="form-group form-focus">
                            <label class="focus-label">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" required autocomplete="new-password"
                                class="form-control" placeholder="********" />
                        </div>
                        <div class="text-right">
                            <a class="forgot-link" href="#"
                                @click="showRegister = !showRegister; showLogin = !showLogin; ">{{ __('Already registered?') }}?</a>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class="row form-row social-login">
                            <div class="col-6">
                                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i>
                                    Login</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i>
                                    Login</a>
                            </div>
                        </div>
                    </form>
                    <!-- /Register Form -->

                </div>
            </div>
        </div>
    </div>
    <!-- /User Register Modal -->

    <!-- Login Modal -->
    <div class="modal account-modal fade" :class="{'show': showLogin === true }" id="login_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-0 border-0">
                    <button type="button" class="close" @click="showLogin = false">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login-header">
                        <h3>Login <span>Truelysell</span></h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group form-focus">
                            <label class="focus-label">{{ __('Email') }}</label>
                            <input class="form-control" type="email" name="email" required autofocus />
                        </div>
                        <div class="form-group form-focus">
                            <label class="focus-label">{{ __('Password') }}</label>
                            <input class="form-control" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>
                        <div class="text-right">
                        </div>
                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                        <div class="login-or"> <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class="row form-row social-login">
                            <div class="col-6">
                                <a href="#" class="btn btn-facebook btn-block">
                                    <i class="fab fa-facebook-f mr-1"></i> Login</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-google btn-block">
                                    <i class="fab fa-google mr-1"></i>
                                    Login
                                </a>
                            </div>
                        </div>
                        <div class="text-center dont-have">Don’t have an account? <a href="#">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Login Modal -->
@endsection

<x-guest-layout>
    Welcome
</x-guest-layout>
