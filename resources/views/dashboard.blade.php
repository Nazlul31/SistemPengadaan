@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Welcome Section -->
    <div class="glass-card p-8 rounded-2xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2">
                    Selamat Datang, {{ Auth::user()->name }}!
                </h1>
                <p class="text-gray-600 text-lg">
                    Dashboard Sistem Pengadaan Barang dan Jasa
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}
                </p>
            </div>
            <div class="hidden md:block">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 via-purple-600 to-indigo-700 rounded-2xl flex items-center justify-center transform rotate-6 hover:rotate-3 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="stats-card bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-2xl text-white hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-blue-100 mb-1">Total Barang</h2>
                    <p class="text-3xl font-bold">{{ \App\Models\Barang::count() }}</p>
                    <p class="text-sm text-blue-200 mt-2">Item terdaftar</p>
                </div>
                <div class="bg-white/20 p-3 rounded-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="stats-card bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-2xl text-white hover:from-green-600 hover:to-green-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-green-100 mb-1">Total Vendor</h2>
                    <p class="text-3xl font-bold">{{ \App\Models\Vendor::count() }}</p>
                    <p class="text-sm text-green-200 mt-2">Mitra terdaftar</p>
                </div>
                <div class="bg-white/20 p-3 rounded-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h6m-6 4h6m-6 4h6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="stats-card bg-gradient-to-br from-orange-500 to-orange-600 p-6 rounded-2xl text-white hover:from-orange-600 hover:to-orange-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-orange-100 mb-1">Pengadaan Aktif</h2>
                    <p class="text-3xl font-bold">{{ \App\Models\Pengadaan::where('status', 'pending')->count() }}</p>
                    <p class="text-sm text-orange-200 mt-2">Menunggu proses</p>
                </div>
                <div class="bg-white/20 p-3 rounded-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Quick Actions -->
        <div class="glass-card p-6 rounded-2xl">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Aksi Cepat
            </h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('barang.create') }}" class="action-card group bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex flex-col items-center text-center">
                        <div class="bg-blue-500 p-3 rounded-xl mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-700">Tambah Barang</span>
                    </div>
                </a>

                <a href="{{ route('vendor.create') }}" class="action-card group bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl hover:from-green-100 hover:to-green-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex flex-col items-center text-center">
                        <div class="bg-green-500 p-3 rounded-xl mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-700">Tambah Vendor</span>
                    </div>
                </a>

                <a href="{{ route('pengadaan.create') }}" class="action-card group bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-xl hover:from-purple-100 hover:to-purple-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex flex-col items-center text-center">
                        <div class="bg-purple-500 p-3 rounded-xl mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-700">Buat Pengadaan</span>
                    </div>
                </a>

                <a href="{{ route('laporan.index') }}" class="action-card group bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl hover:from-orange-100 hover:to-orange-200 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="flex flex-col items-center text-center">
                        <div class="bg-orange-500 p-3 rounded-xl mb-3 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold text-gray-700">Lihat Laporan</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="glass-card p-6 rounded-2xl">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Aktivitas Terbaru
            </h3>
            <div class="space-y-3">
                @php
                    $recentPengadaan = \App\Models\Pengadaan::latest()->take(5)->get();
                @endphp
                
                @forelse($recentPengadaan as $pengadaan)
                    <div class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-semibold text-gray-800">{{ $pengadaan->nama_pengadaan }}</p>
                            <p class="text-xs text-gray-500">{{ $pengadaan->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                            @if($pengadaan->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($pengadaan->status == 'disetujui') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ ucfirst($pengadaan->status) }}
                        </span>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p class="text-gray-500">Belum ada aktivitas terbaru</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .stats-card {
        position: relative;
        overflow: hidden;
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .stats-card:hover::before {
        left: 100%;
    }
    
    .action-card {
        position: relative;
        overflow: hidden;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endsection