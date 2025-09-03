@extends('welcome')

@section('title', 'Riwayat Presensi')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Riwayat Presensi</h2>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Check In</th>
                    <th class="px-4 py-3">Check Out</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Catatan</th>
                    <th class="px-4 py-3">Detail</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($data as $item )
                   
              
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $item->tgl }}</td>
                    <td class="px-4 py-3">{{ $item->check_in }}</td>
                    <td class="px-4 py-3">{{ $item->check_out }}</td>
                    <td class="px-4 py-3">
                        @if($item->status === 'present')
                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">Hadir</span>
                        @elseif($item->status === 'late')
                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">Terlambat</span>
                        @elseif($item->status === 'leave')
                            <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">Izin</span>
                        @else
                            <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">Alpha</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 max-w-xs truncate">{{ $item->notes ?? '' }}</td>
                    <td class="px-4 py-3  truncate hover:text-blue-500"><a href="">Detail</a></td>

                </tr>
                @endforeach  
            </tbody>
        </table>
    </div>
</div>
@endsection
