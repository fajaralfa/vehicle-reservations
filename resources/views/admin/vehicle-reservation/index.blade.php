@include('partial.head', ['title' => 'Daftar Pemesanan Kendaraan'])
@include('partial.sidebar')

<x-main-container>
    <h1 class="fs-2 text-center">Daftar Pemesanan Kendaraan</h1>
    <table class="table overflow-x-scroll">
        <thead>
            <tr>
                <th>Pemesan</th>
                <th>Pemberi Izin</th>
                <th>Kode Kendaraan</th>
                <th>Nama Pengemudi</th>
                <th>Status Perizinan</th>
                <th>Waktu Keputusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicleReservations as $item)
            <tr>
                <td>{{ $item->orderer->name }}</td>
                <td>{{ $item->approver?->name }}</td>
                <td>{{ $item->vehicle->item_code }}</td>
                <td>{{ $item->vehicleDriver?->name }}</td>
                <td>{{ match($item->is_approved) { 0 => 'ditolak', 1 => 'diizinkan', null => 'menunggu' } }}</td>
                <td>{{ $item->approved_date ?? 'menunggu' }}</td>
                <td>
                    @if (is_null($item->admin))
                        <a href="/admin/vehicle-reservations/{{ $item->id }}/process">Proses</a>
                    @else
                        <a href="/admin/vehicle-reservations/{{ $item->id }}">Rincian</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-main-container>

@include('partial.foot')