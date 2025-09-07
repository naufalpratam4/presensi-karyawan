@extends('welcome')

@section('content')
    @include('template.navbar')

    <div class="flex justify-center items-center py-10">
        <div class="bg-white rounded-lg shadow-lg max-w-4xl w-full p-6 mx-4">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Foto -->
                <div class="w-full md:w-1/3">
                    <img src="https://picsum.photos/400" alt="Foto Absen"
                        class="w-full h-64 object-cover rounded-lg shadow">
                    <form action="{{ route('presensi.checkin') }}" method="POST">
                        @csrf
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <div class="text-center my-4">
                            @if (!$data || !$data->check_in)
                                <!-- Belum presensi sama sekali -->
                                <button class="px-4 py-2 bg-green-400 text-white rounded-lg hover:bg-green-500 cursor-pointer"
                                    type="submit">Masuk</button>
                            @elseif ($data->check_in && !$data->check_out)
                                <!-- Sudah check-in, tapi belum check-out -->
                                <button class="px-4 py-2 bg-red-400 rounded-lg hover:bg-red-500 text-white
                                        cursor-pointer" type="submit">Keluar</button>
                            @else
                                <!-- Sudah check-in dan check-out -->
                                <span class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700">
                                    Anda telah keluar
                                </span>
                            @endif
                        </div>
                        <div class="visible-print text-center">
                            {{-- tombol download --}}
                            <a href="{{ route('download.qr') }}"
                                class="inline-block mt-3 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                Download QR Code
                            </a>
                        </div>
                    </form>
                    <script>
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(pos => {
                                document.getElementById('latitude').value = pos.coords.latitude;
                                document.getElementById('longitude').value = pos.coords.longitude;
                            });
                        }
                    </script>

                </div>


                <!-- Detail Absen -->
                <div class="flex-1 space-y-3">
                    <div class="text-sm text-gray-600">
                        Tanggal : <span id="nowText" class="font-semibold"></span>
                    </div>

                    <script>
                        setInterval(() => {
                            const now = new Date();
                            document.getElementById('nowText').textContent =
                                now.toLocaleString('id-ID', { dateStyle: 'full', timeStyle: 'medium' });
                        }, 1000);
                    </script>

                    <div class="text-sm text-gray-600">
                        Lokasi Anda : <span id="lokasiUser" class="font-semibold">Mendeteksi...</span>
                    </div>

                    <script>
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                pos => {
                                    document.getElementById('lokasiUser').textContent =
                                        `${pos.coords.latitude.toFixed(4)}, ${pos.coords.longitude.toFixed(4)}`;
                                },
                                () => document.getElementById('lokasiUser').textContent = "Gagal mendeteksi lokasi"
                            );
                        } else {
                            document.getElementById('lokasiUser').textContent = "Browser tidak mendukung";
                        }
                    </script>


                    <!-- Grid Absen -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                        <div class="rounded-lg px-6 py-3 bg-green-100 border border-green-400 shadow text-center">
                            <div class="font-semibold text-gray-700">Absen Masuk</div>
                            <div class="text-lg font-bold text-green-700">{{ $data->check_in ?? '' }}</div>
                        </div>
                        <div class="rounded-lg px-6 py-3 bg-red-100 border border-red-400 shadow text-center">
                            <div class="font-semibold text-gray-700">Absen Keluar</div>
                            <div class="text-lg font-bold text-red-700">{{ $data->check_out ?? '' }}</div>
                        </div>
                        <div class="rounded-lg px-4 py-3 bg-blue-100 border border-blue-400 shadow text-center">
                            <div class="font-semibold text-gray-700">Koordinat Absen</div>
                            <div class="text-sm font-medium text-blue-700"></div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="mt-4">
                        <iframe class="rounded-lg w-full"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.102487014774!2d110.32200737415616!3d-6.997210593003933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70610739fd3b35%3A0xf21f7728b137ab3b!2sDarma%20Kedai!5e0!3m2!1sid!2sid!4v1756396663244!5m2!1sid!2sid"
                            height="200" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <hr class="my-4 border-gray-200">

                    <!-- Tombol -->
                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-yellow-500 rounded-lg text-white hover:bg-yellow-600">Ajukan
                            Izin</button>
                        <a href="/riwayat-absen">
                            <button
                                class="px-4 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-600 cursor-pointer">Riwayat
                                Absen</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection