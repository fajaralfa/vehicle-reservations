@php
    $navLinks = [
        '/admin' => 'Dashboard',
        '/admin/vehicle-reservations' => 'Pemesanan Kendaraan',
        '/admin/vehicle-usages' => 'Penggunaan Kendaraan',
    ];
@endphp

<div class="position-fixed d-flex flex-column bg-primary" style="width: 16rem; height: 100vh;">
    <div class="btn btn-primary rounded-none fs-3 fw-bold">{{ env('APP_NAME') }}</div>
    @foreach ($navLinks as $link => $label)
        <a href="{{ $link }}" @class(["btn btn-primary text-start rounded-0", "active" => false])>{{ $label }}</a>
    @endforeach
    <form action="/admin/logout" method="post" class="position-absolute bottom-0 w-100">@csrf
        <button type="submit" class="btn btn-primary text-start rounded-0 w-100">Keluar</button>
    </form>
</div>
