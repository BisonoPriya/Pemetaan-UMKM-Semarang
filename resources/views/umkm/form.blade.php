@csrf

<div class="max-w-7xl mx-auto space-y-6">

    {{-- HEADER SECTION --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 shadow-xl">
        <div class="flex items-center space-x-4">
            <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-white">Data UMKM</h1>
                <p class="text-blue-100 mt-1">Kelola informasi dan lokasi UMKM Anda</p>
            </div>
        </div>
    </div>

    {{-- INFORMASI UMKM CARD --}}
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        
        {{-- Card Header --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-5 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Informasi UMKM</h2>
            </div>
        </div>

        {{-- Card Body --}}
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama UMKM --}}
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Nama UMKM</span>
                        </span>
                    </label>
                    <input 
                        type="text" 
                        name="nama_umkm"
                        value="{{ $umkm->nama_umkm ?? '' }}"
                        placeholder="Masukkan nama UMKM"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- Nama Pemilik --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Nama Pemilik</span>
                        </span>
                    </label>
                    <input 
                        type="text" 
                        name="nama_pemilik"
                        value="{{ $umkm->nama_pemilik ?? '' }}"
                        placeholder="Masukkan nama pemilik"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span>Kategori</span>
                        </span>
                    </label>
                    <select 
                        name="kategori_id"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-4 focus:ring-purple-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}"
                                @selected(isset($umkm) && $umkm->kategori_id == $k->id)>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Alamat --}}
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Alamat Lengkap</span>
                        </span>
                    </label>
                    <input 
                        type="text" 
                        name="alamat"
                        value="{{ $umkm->alamat ?? '' }}"
                        placeholder="Masukkan alamat lengkap"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-red-500 focus:ring-4 focus:ring-red-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- RT --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">RT</label>
                    <input 
                        type="text" 
                        name="rt"
                        value="{{ $umkm->rt ?? '' }}"
                        placeholder="000"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- RW --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">RW</label>
                    <input 
                        type="text" 
                        name="rw"
                        value="{{ $umkm->rw ?? '' }}"
                        placeholder="000"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- Kelurahan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kelurahan</label>
                    <input 
                        type="text" 
                        name="kelurahan"
                        value="{{ $umkm->kelurahan ?? '' }}"
                        placeholder="Masukkan kelurahan"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- Kecamatan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan</label>
                    <input 
                        type="text" 
                        name="kecamatan"
                        value="{{ $umkm->kecamatan ?? '' }}"
                        placeholder="Masukkan kecamatan"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- Bahan Baku --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span>Bahan Baku Utama</span>
                        </span>
                    </label>
                    <input 
                        type="text" 
                        name="bahan_baku"
                        value="{{ $umkm->bahan_baku ?? '' }}"
                        placeholder="Contoh: Tepung, Gula, dll"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- Alat Produksi --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Alat Produksi</span>
                        </span>
                    </label>
                    <input 
                        type="text" 
                        name="alat_produksi"
                        value="{{ $umkm->alat_produksi ?? '' }}"
                        placeholder="Contoh: Oven, Mixer, dll"
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 focus:bg-white transition-all duration-200 outline-none"
                    >
                </div>

                {{-- Deskripsi --}}
                <div class="col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            <span>Deskripsi UMKM</span>
                        </span>
                    </label>
                    <textarea 
                        name="deskripsi"
                        rows="4"
                        placeholder="Ceritakan tentang UMKM Anda..."
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-teal-500 focus:ring-4 focus:ring-teal-100 focus:bg-white transition-all duration-200 outline-none resize-none"
                    >{{ $umkm->deskripsi ?? '' }}</textarea>
                </div>

            </div>
        </div>
    </div>

    {{-- LOKASI CARD --}}
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        
        {{-- Card Header --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-5 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="bg-red-600 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Lokasi & Peta</h2>
            </div>
        </div>

        {{-- Card Body --}}
        <div class="p-8">
            
            {{-- Geocode Button --}}
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <div class="flex items-start space-x-4">
                    <div class="bg-blue-600 p-3 rounded-lg flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 mb-2">Deteksi Lokasi Otomatis</h3>
                        <p class="text-sm text-gray-600 mb-4">Sistem akan menentukan koordinat lokasi UMKM berdasarkan alamat yang Anda masukkan</p>
                        <button 
                            type="button"
                            id="btnGeocode"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span>Ambil Lokasi Sekarang</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Koordinat --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-md text-xs font-bold">LAT</span>
                            <span>Latitude</span>
                        </span>
                    </label>
                    <input 
                        type="text"
                        name="latitude"
                        id="latitude"
                        readonly
                        value="{{ old('latitude', $umkm->latitude ?? '') }}"
                        placeholder="-6.9667"
                        class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-300 rounded-xl text-gray-600 font-mono cursor-not-allowed"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <span class="flex items-center space-x-2">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md text-xs font-bold">LNG</span>
                            <span>Longitude</span>
                        </span>
                    </label>
                    <input 
                        type="text"
                        name="longitude"
                        id="longitude"
                        readonly
                        value="{{ old('longitude', $umkm->longitude ?? '') }}"
                        placeholder="110.4167"
                        class="w-full px-4 py-3 bg-gray-100 border-2 border-gray-300 rounded-xl text-gray-600 font-mono cursor-not-allowed"
                    >
                </div>
            </div>

            {{-- Peta --}}
            <div class="rounded-xl overflow-hidden border-4 border-gray-200 shadow-2xl">
                <div id="map" style="height: 450px;"></div>
            </div>

        </div>
    </div>

</div>

{{-- LEAFLET --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    let startLat = Number("{{ $umkm->latitude ?? '' }}") || -6.9667;
    let startLng = Number("{{ $umkm->longitude ?? '' }}") || 110.4167;

    window.map = L.map('map').setView([startLat, startLng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    window.marker = L.marker([startLat, startLng]).addTo(map);
});
</script>

<script>
document.getElementById('btnGeocode').addEventListener('click', function () {

    const btn = this;
    const originalText = btn.innerHTML;
    
    // Loading state
    btn.disabled = true;
    btn.innerHTML = `
        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span>Mencari lokasi...</span>
    `;

    const alamat     = document.querySelector('input[name="alamat"]').value;
    const kelurahan  = document.querySelector('input[name="kelurahan"]').value;
    const kecamatan  = document.querySelector('input[name="kecamatan"]').value;

    if (!alamat || !kecamatan) {
        alert('⚠️ Alamat dan kecamatan wajib diisi');
        btn.disabled = false;
        btn.innerHTML = originalText;
        return;
    }

    const query = `${alamat}, ${kelurahan}, ${kecamatan}, Semarang, Jawa Tengah, Indonesia`;

    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
            if (data.length === 0) {
                alert('❌ Lokasi tidak ditemukan. Pastikan alamat sudah benar.');
                btn.disabled = false;
                btn.innerHTML = originalText;
                return;
            }

            const lat = data[0].lat;
            const lon = data[0].lon;

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            map.setView([lat, lon], 15);
            marker.setLatLng([lat, lon]);

            // Success state
            btn.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>Lokasi Ditemukan!</span>
            `;
            
            setTimeout(() => {
                btn.disabled = false;
                btn.innerHTML = originalText;
            }, 2000);
        })
        .catch(() => {
            alert('⚠️ Gagal mengambil lokasi. Periksa koneksi internet Anda.');
            btn.disabled = false;
            btn.innerHTML = originalText;
        });
});
</script>