@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 h-screen flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="relative flex flex-col min-w-0 rounded-lg break-words border border-black dark:border-white bg-white dark:bg-gray-800 shadow-lg">
                <div class="py-6 px-6 mb-0 bg-gray-500 text-white dark:border-white rounded-t-lg dark:bg-gray-800 dark:text-white">
                    <h2 class="text-center text-2xl font-bold">{{ __('Login') }}</h2>
                </div>

                @if (session('success'))
                    <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 dark:bg-green-800 border-green-300 text-green-800 dark:text-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex-auto p-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-gray-800 focus:border-gray-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-800 dark:focus:border-gray-800">

                            @error('email')
                                <span class="text-sm text-red-500 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-6 relative">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                            <input type="password" id="password" name="password" required
                                class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-800 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-800 dark:focus:border-gray-800">
                            <button type="button" onclick="togglePasswordVisibility()"
                                class="absolute top-10 right-0 flex items-center px-3">
                                <i class="bi bi-eye text-gray-700 dark:text-gray-300"></i>
                            </button>

                            @error('password')
                                <span class="text-sm text-red-500 mt-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                                    class="w-4 h-4 border border-gray-900 rounded bg-gray-50 focus:ring-3 focus:ring-gray-800 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-white dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                        </div>

                        <button type="submit"
                            class="text-gray-900 dark:text-white bg-white dark:bg-gray-800 border border-gray-900 dark:border-white hover:shadow-xl focus:ring-4 focus:outline-none focus:ring-purple-300 font-semibold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:focus:ring-gray-700">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var eyeIcon = passwordField.nextElementSibling.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }
    </script>
@endsection
