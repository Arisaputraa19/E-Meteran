@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-2 xl:grid-cols-4">
  <div class="p-4 bg-white rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Total Pelanggan</h2>
    <p class="mt-1 text-2xl font-bold text-[#1E40AF]">{{ $totalPelanggan }}</p>
  </div>
  <div class="p-4 bg-white rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Belum Bayar</h2>
    <p class="mt-1 text-2xl font-bold text-red-700">{{ $belumBayar }}</p>
  </div>
  <div class="p-4 bg-white rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Total yang sudah bayar</h2>
    <p class="mt-1 text-2xl font-bold text-green-500">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</p>
  </div>
    <div class="p-4 bg-white rounded-xl shadow">
    <h2 class="text-sm text-gray-500">Total yang belum bayar</h2>
    <p class="mt-1 text-2xl font-bold text-red-500">Rp {{ number_format($totalBelumBayar, 0, ',', '.') }}</p>
  </div>
</div>


{{-- Chart Section --}}
<div class="mt-8 bg-white rounded-xl shadow p-6">
  <h3 class="text-lg font-semibold text-[#1E3A8A] mb-4">Statistik Pembayaran Bulanan</h3>
  <canvas id="paymentChart" height="100"></canvas>
</div>

{{-- Table Section --}}
<div class="mt-8 bg-white rounded-xl shadow p-6">
  <h3 class="text-lg font-semibold text-[#1E3A8A] mb-4">List Pelanggan yang belum bayar</h3>
  <div class="overflow-x-auto">
    <table class="min-w-full">
      <thead>
        <tr class="bg-gray-100">
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nama Pelanggan</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Nomor Handphone</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Total Tagihan</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Status Bayar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listBelumBayar as $meteran)
          <tr>
            <td class="border-t px-4 py-2">{{ $meteran->pelanggan->nama_pelanggan }}</td>
            <td class="border-t px-4 py-2">{{ $meteran->pelanggan->no_hp }}</td>
            <td class="border-t px-4 py-2">Rp {{ number_format($meteran->total_tagihan, 0, ',', '.') }}</td>
            <td class="border-t px-4 py-2">{{ $meteran->status_bayar }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const chartLabels = {!! json_encode($chartData->pluck('bulan')) !!};
  const chartData = {!! json_encode($chartData->pluck('total')) !!};

  const ctx = document.getElementById('paymentChart').getContext('2d');
  const paymentChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: chartLabels,
      datasets: [{
        label: 'Pembayaran (Rp)',
        data: chartData,
        backgroundColor: '#1E40AF',
        borderRadius: 6,
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function(value) {
              return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
            }
          }
        }
      }
    }
  });
</script>
@endpush