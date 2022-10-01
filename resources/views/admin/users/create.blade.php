<form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-jet-input-error for="name"></x-jet-input-error>

            </div>
            <div class="mt-4">
                    <x-jet-label value="{{ __('Phone Number') }}" />

                    <x-jet-input class=" block mt-1 w-full {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" id="phone_number" name="phone_number"
                                 :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                    <x-jet-input-error for="phone_number"></x-jet-input-error>
                </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" :value="old('email')" required />
                <x-jet-input-error for="email"></x-jet-input-error>

            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" required autocomplete="new-password" />
                <x-jet-input-error for="password"></x-jet-input-error>

            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation"></x-jet-input-error>

            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>