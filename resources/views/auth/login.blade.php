@extends('welcome')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

            <form action="{{ route('login.user') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="Masukkan email" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="Masukkan password" required>
                </div>

                <!-- Tombol Login -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection