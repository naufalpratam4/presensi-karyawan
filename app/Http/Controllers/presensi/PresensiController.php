<?php

namespace App\Http\Controllers\presensi;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
    {
        $data = Presensi::where('user_id', Auth::id())
        ->where('tgl', now()->toDateString())  
        ->first();

    return view('presensiUser.index', compact('data'));
    }

    public function checkIn(Request $request)
    {
        $user  = Auth::user();
    $today = now()->toDateString();

    $presensi = Presensi::where('user_id', $user->id)
        ->where('tgl', $today)
        ->first();

    $lat = $request->input('latitude');
    $lon = $request->input('longitude');

    if (!$presensi) {
        // CHECK-IN
        Presensi::create([
            'user_id'      => $user->id,
            'tgl'          => $today,
            'check_in'     => now()->toTimeString(),
            'latitude_in'  => $lat,
            'longitude_in' => $lon,
        ]);
        return back()->with('success', 'Check-in berhasil');
    }

    if ($presensi->check_in && is_null($presensi->check_out)) {
        // CHECK-OUT
        $presensi->update([
            'check_out'     => now()->toTimeString(),
            'latitude_out'  => $lat,
            'longitude_out' => $lon,
        ]);
        return back()->with('success', 'Check-out berhasil');
    }

    return back()->with('info', 'Anda sudah menyelesaikan presensi hari ini');
    }

    public function checkOut(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::now()->toDateString();

        $presensi = Presensi::where('user_id', $user->id)->where('tgl', $today)->first();

        $data = [
            'check_out' => Carbon::now()->toTimeString(),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ];

        $presensi->update($data);
        return redirect()->back()->with('success', 'Berhasil Checkout');
    }

   public function riwayat()
{
    $data = Presensi::where('user_id', Auth::id())
        ->orderBy('tgl', 'desc') // supaya riwayat terbaru muncul di atas
        ->get();

    return view('presensiUser.riwayatAbsen', compact('data'));
}

}
