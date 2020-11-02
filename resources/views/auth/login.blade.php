<x-guest-layout>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 mt-5 mb-5">
                <x-jet-validation-errors class="mb-4" /> 

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
                    
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
