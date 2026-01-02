@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">

    <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg p-8 border border-gray-100">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            ✏️ Edit Data UMKM
        </h1>

        <form action="{{ route('umkm.update', $umkm->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            @include('umkm.form')

            <button 
                class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-xl font-medium shadow">
                Simpan Perubahan
            </button>
        </form>

    </div>

</div>
@endsection
