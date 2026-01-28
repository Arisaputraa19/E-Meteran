<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Periode;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use App\Models\Meteran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalPelanggan = Pelanggan::count();

        $belumBayar = Meteran::where('status_bayar', 'BELUM')->count();
        $listBelumBayar = Meteran::with('pelanggan')->where('status_bayar', 'BELUM')->get();
        $totalPembayaran = Meteran::where('status_bayar', 'LUNAS')->sum('total_tagihan');
        $totalBelumBayar = Meteran::where('status_bayar', 'BELUM')->sum('total_tagihan');
        $chartData = Meteran::select(
            DB::raw('MONTHNAME(created_at) as bulan'),
            DB::raw('SUM(total_tagihan) as total')
        )
            ->where('status_bayar', 'LUNAS')
            ->groupBy(DB::raw('MONTH(created_at)'), DB::raw('MONTHNAME(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        return view('admin.dashboard', compact(
            'totalPelanggan',
            'belumBayar',
            'totalPembayaran',
            'chartData',
            'listBelumBayar',
            'totalBelumBayar'
        ));
    }
    public function dashboardUser()
    {
        $user = Auth::user();
        $periodeAktif = Periode::where('status', 'AKTIF')->first();

        $pelanggan = $user->pelanggan; // Ambil relasi pelanggan dari user

        $meteran = null;
        if ($pelanggan && $periodeAktif) {
            $meteran = Meteran::where('pelanggan_id', $pelanggan->id)
                ->where('periode_id', $periodeAktif->id)
                ->first();
        };
        // Ambil pengumuman yang akan ditampilkan ke user
        $pengumumans = Pengumuman::where('ditampilkan_di_user', true)->latest()->get();

        return view('admin.dashboardUser', compact('user', 'periodeAktif', 'meteran', 'pengumumans'));
    }
}
