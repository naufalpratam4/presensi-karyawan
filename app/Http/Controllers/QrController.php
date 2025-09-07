<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function download()
{
    $user = Auth::user();

    $svg = QrCode::format('svg')
        ->size(300)
        ->generate((string) $user->id);

    $fileName = 'qr_user_' . $user->first_name . '_' . $user->last_name . '.svg';

    return response($svg, 200, [
        'Content-Type' => 'image/svg+xml',
        'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
    ]);
}

}
