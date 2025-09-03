@extends('welcome')

@section('content')
    @include('template.navbarAdmin')

    <div class="m-10 p-6 bg-white rounded-xl shadow-md">
        
        <div class="flex justify-between items-center mb-3">
            <h2 class="text-2xl font-bold text-gray-700">Daftar Karyawan</h2>
            <a href="/admin/karyawan/create"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow-md transition">
                + Add Karyawan
            </a>
        </div>

        <div class="overflow-x-auto">
            <!-- Search -->
        <form action=" " method="GET" class="flex mb-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari karyawan..."
                class="w-48 md:w-64 px-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg text-sm transition">
                Cari
            </button>
        </form>
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Nama Karyawan</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">No HP</th>
                        <th class="py-3 px-6 text-left">Posisi</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                    @foreach ($data as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-6">{{$item->first_name}} {{$item->last_name}}</td>
                            <td class="py-3 px-6">{{$item->email}}  </td>
                            <td class="py-3 px-6">{{$item->no_hp}}  </td>
                            <td class="py-3 px-6">{{$item->posisi}}  </td>
                            <td class="py-3 px-6">{{$item->status}}  </td>
                            <td class="py-3 px-6 text-center space-x-2">
                                <a href=""
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-xs shadow">
                                    View
                                </a>
                                <a href=""
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-xs shadow">
                                    Edit
                                </a>
                                <form action="" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs shadow">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($data->isEmpty())
                        <tr>
                            <td colspan="2" class="text-center py-6 text-gray-400 italic">
                                Belum ada data karyawan.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection