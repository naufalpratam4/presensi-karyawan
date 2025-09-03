@extends('welcome')

@section('content')
    @include('template.navbarAdmin')

    <div class="m-10 p-6 bg-white rounded-xl shadow-md max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Tambah Karyawan</h2>

        <form action="{{ route('karyawan.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama -->
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Masukkan nama karyawan" required>
                @error('first_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Masukkan nama karyawan" required>
                @error('last_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Masukkan email karyawan" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

           <!-- Password -->
<div>
    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
    <div class="relative">
        <input type="password" name="password" id="password"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none pr-12"
               placeholder="Masukkan password" required>

        <!-- Toggle Button -->
        <button type="button"
                onclick="let p=document.getElementById('password'); p.type = p.type === 'password' ? 'text' : 'password';"
                class="absolute inset-y-0 right-0 px-3 text-gray-500 hover:text-gray-700">
            view
        </button>
    </div>
    @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


             

            <!-- Tombol -->
            <div class="flex justify-end gap-3">
                <a href="/admin/karyawan"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow transition cursor-pointer">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
