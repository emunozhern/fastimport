<x-guest-layout>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 mt-5 mb-5">
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
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
