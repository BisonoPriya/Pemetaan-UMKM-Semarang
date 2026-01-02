@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-lg mx-auto">

    <h1 class="text-lg font-bold mb-4">Tambah UMKM</h1>

    <form action="{{ route('umkm.store') }}" method="POST">
        @include('umkm.form')
        <button class="w-full bg-green-600 ttransition text-white py-3 rounded-xl font-medium shadow">
            Simpan
            
        </button>
    </form>

</div>
@endsection
