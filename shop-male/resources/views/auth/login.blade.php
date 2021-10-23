<x-guest-layout>
    
    <x-auth-card>
        <x-slot name="logo">
            
        </x-slot>

        {{-- theme --}}

        
        <!-- htlm -->

        

        <section class="forms-section">
            <h1 class="section-title">Animated Forms</h1>
            <div class="forms">
              <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login">
                  Login
                  <span class="underline"></span>
                </button>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                
                <form class="form form-login" method="POST" action="{{ route('login') }}">
                    @csrf
                  <fieldset>
                    <legend>Please, enter your email and password for login.</legend>
                    <div class="input-block">
                        <x-label for="login-email" :value="__('Email')" />
        
                        <x-input id="login-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4 input-block">
                        <x-label for="login-password" :value="__('Password')" />

                        <x-input id="login-password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class=" text-sm text-blue-600 hover:text-blue-900" href="{{ route('password.request') }}" >
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-button class="ml-3 btn-login">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                  </fieldset>
                </form>
              </div>

              <!--register-->
              
              <div class="form-wrapper">
                <button type="button" class="switcher switcher-signup">
                  Sign Up
                  <span class="underline"></span>
                </button>
                <form method="POST" action="{{ route('register') }}" class="form form-signup">
                    @csrf
                  <fieldset>
                    <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                    <!-- Name -->
                    <div class="input-block">
                        <x-label for="signup-name" :value="__('Name')" />

                        <x-input id="signup-name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
                    <!-- Email Address -->
                    <div class="mt-4 input-block">
                        <x-label for="signup-email" :value="__('Email')" />

                        <x-input id="signup-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>


                    <!-- Password -->
                    <div class="mt-4 input-block">
                        <x-label for="signup-password" :value="__('Password')" />

                        <x-input id="signup-password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4 input-block">
                        <x-label for="signup-password-confirm" :value="__('Confirm Password')" />

                        <x-input id="signup-password-confirm" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
                    </div>

                  </fieldset>

                  <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 " href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
    
                    <x-button class="ml-4 btn-signup">
                        {{ __('Register') }}
                    </x-button>
                </div>
                </form>
              </div>
            </div>
          </section>
          <script>
            const switchers = [...document.querySelectorAll('.switcher')]

            switchers.forEach(item => {
                item.addEventListener('click', function() {
                    switchers.forEach(item => item.parentElement.classList.remove('is-active'))
                    this.parentElement.classList.add('is-active')
                })
            })
          </script>

        {{-- end theme --}}
    </x-auth-card>
</x-guest-layout>
