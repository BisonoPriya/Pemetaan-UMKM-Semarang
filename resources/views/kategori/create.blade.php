@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-md mx-auto">

    <h1 class="text-lg font-bold mb-4">Tambah Kategori</h1>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <label class="block mb-1 font-semibold">Nama Kategori</label>
        <input type="text" name="nama_kategori"
               class="border w-full p-2 mb-4 rounded"
               required>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>
</div>
@endsection
