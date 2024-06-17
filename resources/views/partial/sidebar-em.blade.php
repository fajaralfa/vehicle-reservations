@php
    $navLinks = [
        '/employee' => 'Dashboard',
        '/employee/vehicle-reservations' => 'Pengajuan Kamu',
        '/employee/vehicle-approval' => 'Daftar Persetujuan Kendaraan',
    ];
@endphp

<div class="position-fixed d-flex flex-column bg-info" style="width: 16rem; height: 100vh;">
    <div class="btn btn-info rounded-none fs-3 fw-bold">{{ env('APP_NAME') }}</div>
    @foreach ($navLinks as $link => $label)
        <a href="{{ $link }}" @class(["btn btn-info text-start rounded-0", "active" => false])>{{ $label }}</a>
    @endforeach
    <form action="/employee/logout" method="post" class="position-absolute bottom-0 w-100">@csrf
        <button type="submit" class="btn btn-info text-start rounded-0 w-100">Logout</button>
    </form>
</div>
