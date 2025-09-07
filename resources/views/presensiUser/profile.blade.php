@extends('welcome')

@section('content')
@include('template.navbar')

<div class="bg-slate-100 min-h-screen pt-5">
  

  <!-- Main content -->
  <main class="mx-auto mt-6 max-w-5xl px-4">
    <div class="relative rounded-2xl bg-white p-6 shadow-md">
      

      <h2 class="mb-5 text-lg font-semibold text-slate-800">Personal details</h2>

      <form id="profile-form"
            method="POST"
            action=" "
            class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        @csrf
        @method('PUT')

        <!-- First / Last name -->
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">First name</label>
          <input name="first_name" type="text" placeholder="Jake"
                 value="{{ old('first_name', $user->first_name ?? '') }}"
                 class="w-full rounded-lg border @error('first_name') border-red-500 @else border-slate-300 @enderror bg-white px-3 py-2 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
          @error('first_name')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Last name</label>
          <input name="last_name" type="text" placeholder="Nicholas"
                 value="{{ old('last_name', $user->last_name ?? '') }}"
                 class="w-full rounded-lg border @error('last_name') border-red-500 @else border-slate-300 @enderror bg-white px-3 py-2 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
          @error('last_name')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Mobile / Email -->
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Mobile number</label>
          <input name="phone" type="tel" placeholder="+62 857 9985 7403"
                 value="{{ old('phone', $karyawan->no_hp ?? '') }}"
                 class="w-full rounded-lg border @error('phone') border-red-500 @else border-slate-300 @enderror bg-white px-3 py-2 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
          @error('phone')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Email ID</label>
          <input name="email" type="email" placeholder="you@example.com"
                 value="{{ old('email', $user->email ?? '') }}"
                 class="w-full rounded-lg border @error('email') border-red-500 @else border-slate-300 @enderror bg-white px-3 py-2 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
          @error('email')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Email ID</label>
          <input name="email" type="email" placeholder="you@example.com"
                 value="{{ old('email', $user->email ?? '') }}"
                 class="w-full rounded-lg border @error('email') border-red-500 @else border-slate-300 @enderror bg-white px-3 py-2 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
          @error('email')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Email ID</label>
          <input name="email" type="email" placeholder="you@example.com"
                 value="{{ old('email', $user->email ?? '') }}"
                 class="w-full rounded-lg border @error('email') border-red-500 @else border-slate-300 @enderror bg-white px-3 py-2 text-sm text-slate-800 placeholder-slate-400 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
          @error('email')
            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
          @enderror
        </div>

        
         

        <!-- Bottom actions -->
        <div class="sm:col-span-2 mt-2 flex justify-end">
          <button
            class="rounded-lg bg-sky-600 px-4 py-2 text-sm font-medium text-white hover:bg-sky-700 active:translate-y-px">
            Save changes
          </button>
        </div>
      </form>
    </div>
  </main>

  <div class="h-10"></div>
</div>
@endsection
