@php
    $navLinks = [
        '/employee' => 'Dashboard',
        '/employee/vehicle-reservations' => 'Your Orders',
        '/employee/vehicle-approval' => 'Vehicle Approval List',
    ];
@endphp

<div class="position-fixed d-flex flex-column bg-secondary" style="width: 16rem; height: 100vh;">
    <div class="btn btn-secondary rounded-none fs-3 fw-bold">{{ env('APP_NAME') }}</div>
    @foreach ($navLinks as $link => $label)
        <a href="{{ $link }}" @class(["btn btn-secondary text-start rounded-0", "active" => false])>{{ $label }}</a>
    @endforeach
    <form action="/employee/logout" method="post">@csrf
        <button type="submit" class="btn btn-secondary text-start rounded-0 w-100">Logout</button>
    </form>
</div>
