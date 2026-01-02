@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">

    <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg p-8 border border-gray-100">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <label class="block mb-1 font-semibold">Nama Kategori</label>
        <input type="text" name="nama_kategori"
               value="{{ $kategori->nama_kategori }}"
               class="border w-full p-2 mb-4 rounded"
               required>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
            </button>

        </form>
    </div>
</div>
@endsection
