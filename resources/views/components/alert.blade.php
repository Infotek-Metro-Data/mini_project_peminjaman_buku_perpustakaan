@php
    $success = session('success');
    $error = session('error');
@endphp

@if ($success)
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        <strong>Berhasil!</strong> {{ $success }}
    </div>
@endif

@if ($error)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        <strong>Gagal!</strong> {{ $error }}
    </div>
@endif
