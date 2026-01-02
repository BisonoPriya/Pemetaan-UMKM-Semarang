@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    {{-- Header Section --}}
    <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-2xl p-8 shadow-xl">
        <div class="flex items-center space-x-4">
            <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-white">Peta Persebaran UMKM</h1>
                <p class="text-green-100 mt-1">Visualisasi lokasi UMKM di Kota Semarang</p>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-3 rounded-xl">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Total Lokasi</p>
                    <p class="text-2xl font-bold text-gray-800" id="totalLokasi">{{ $umkm->whereNotNull('latitude')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 p-3 rounded-xl">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Kategori</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $kategori->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center space-x-4">
                <div class="bg-purple-100 p-3 rounded-xl">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Kecamatan</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $umkm->pluck('kecamatan')->unique()->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center space-x-4">
                <div class="bg-orange-100 p-3 rounded-xl">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Ditampilkan</p>
                    <p class="text-2xl font-bold text-gray-800" id="displayedCount">{{ $umkm->whereNotNull('latitude')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Card --}}
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        
        {{-- Card Header --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-5 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="bg-green-600 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Filter & Pencarian</h2>
            </div>
        </div>

        {{-- Filter Body --}}
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Filter Kategori --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span>Kategori UMKM</span>
                        </span>
                    </label>
                    <select id="filterKategori"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-100 focus:bg-white transition-all duration-200 outline-none">
                        <option value="">🏷️ Semua Kategori</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter Kecamatan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Kecamatan</span>
                        </span>
                    </label>
                    <select id="filterKecamatan"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-100 focus:bg-white transition-all duration-200 outline-none">
                        <option value="">🏘️ Semua Kecamatan</option>
                        @foreach($umkm->pluck('kecamatan')->unique()->sort() as $kec)
                            <option value="{{ $kec }}">{{ $kec }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            {{-- Reset Button --}}
            <div class="mt-6 flex items-center justify-between">
                <button id="btnReset"
                    class="inline-flex items-center space-x-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium text-sm transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    <span>Reset Filter</span>
                </button>

                <div class="text-sm text-gray-500">
                    <span class="font-semibold" id="markerCount">0</span> marker ditampilkan
                </div>
            </div>
        </div>
    </div>
    
    {{-- Map Card --}}
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        
        {{-- Map Header --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-green-600 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Peta Interaktif</h2>
                </div>
                
                <div class="flex items-center space-x-2">
                    <button id="btnFullscreen"
                        class="p-2 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg transition-all duration-200"
                        title="Fullscreen">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Map Container --}}
        <div id="map" class="w-full h-[600px]"></div>

    </div>

</div>

{{-- LEAFLET --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    // Init map (Semarang)
    const map = L.map('map').setView([-6.9904, 110.4229], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap',
        maxZoom: 19
    }).addTo(map);

    const umkmData = @json($umkm);
    let markers = [];

    // Color scheme untuk kategori
    const categoryColors = {
        1: '#3B82F6', // Blue
        2: '#10B981', // Green
        3: '#F59E0B', // Amber
        4: '#EF4444', // Red
        5: '#8B5CF6', // Purple
        6: '#EC4899', // Pink
    };

    function clearMarkers() {
        markers.forEach(marker => map.removeLayer(marker));
        markers = [];
    }

    function updateStats(count) {
        document.getElementById('displayedCount').textContent = count;
        document.getElementById('markerCount').textContent = count;
    }

    function renderMarkers(filterKategori = '', filterKecamatan = '') {
        clearMarkers();

        let count = 0;

        umkmData.forEach(u => {

            // VALIDASI DATA KOORDINAT
            if (!u.latitude || !u.longitude) return;

            // FILTER
            if (filterKategori && u.kategori_id != filterKategori) return;
            if (filterKecamatan && u.kecamatan != filterKecamatan) return;

            count++;

            // Custom icon dengan warna kategori
            const color = categoryColors[u.kategori_id] || '#6B7280';
            
            const customIcon = L.divIcon({
                className: 'custom-marker',
                html: `
                    <div class="relative">
                        <div class="w-8 h-8 bg-white rounded-full border-4 border-white shadow-lg overflow-hidden">
                            <div class="w-full h-full rounded-tl-full rounded-tr-full" style="background: ${color};"></div>
                        </div>
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-[8px] border-l-transparent border-r-[8px] border-r-transparent" style="border-top: 12px solid ${color};"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-3 h-3 bg-white rounded-full"></div>
                    </div>
                `,
                iconSize: [32, 44],
                iconAnchor: [16, 44],
                popupAnchor: [0, -44]
            });

            const marker = L.marker([u.latitude, u.longitude], { icon: customIcon })
                .bindPopup(`
                    <div class="font-sans min-w-[250px]">
                        <div class="text-white p-3 -m-3 mb-3 rounded-t-lg" style="background: linear-gradient(135deg, ${color} 0%, ${color}dd 100%);">
                            <h3 class="m-0 text-lg font-bold">
                                ${u.nama_umkm}
                            </h3>
                            <p class="mt-1 opacity-95 text-sm">
                                ${u.nama_pemilik}
                            </p>
                        </div>
                        
                        <div class="py-1">
                            <div class="flex items-center mb-2">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" style="color: ${color};" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                <span class="font-semibold text-gray-700">${u.kategori.nama_kategori}</span>
                            </div>
                            
                            <div class="flex items-start text-gray-600 text-sm">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>${u.alamat}, ${u.kelurahan}, ${u.kecamatan}</span>
                            </div>
                        </div>
                    </div>
                `);

            marker.addTo(map);
            markers.push(marker);
        });

        updateStats(count);

        // AUTO FIT MAP
        if (markers.length > 0) {
            const group = L.featureGroup(markers);
            map.fitBounds(group.getBounds().pad(0.1));
        } else {
            map.setView([-6.9904, 110.4229], 12);
        }
    }

    // INIT
    renderMarkers();

    // EVENT FILTER
    document.getElementById('filterKategori').addEventListener('change', function () {
        renderMarkers(this.value, document.getElementById('filterKecamatan').value);
    });

    document.getElementById('filterKecamatan').addEventListener('change', function () {
        renderMarkers(document.getElementById('filterKategori').value, this.value);
    });

    // RESET BUTTON
    document.getElementById('btnReset').addEventListener('click', function() {
        document.getElementById('filterKategori').value = '';
        document.getElementById('filterKecamatan').value = '';
        renderMarkers();
    });

    // FULLSCREEN BUTTON
    document.getElementById('btnFullscreen').addEventListener('click', function() {
        const mapElement = document.getElementById('map');
        if (!document.fullscreenElement) {
            mapElement.requestFullscreen().then(() => {
                setTimeout(() => map.invalidateSize(), 100);
            });
        } else {
            document.exitFullscreen().then(() => {
                setTimeout(() => map.invalidateSize(), 100);
            });
        }
    });

    window.addEventListener('resize', () => map.invalidateSize());
});
</script>

<style>
.custom-marker {
    background: transparent !important;
    border: none !important;
}

.leaflet-popup-content-wrapper {
    border-radius: 12px;
    padding: 0;
    overflow: hidden;
}

.leaflet-popup-content {
    margin: 12px;
}

.leaflet-popup-tip {
    display: none;
}
</style>

@endsection