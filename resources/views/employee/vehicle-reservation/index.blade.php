@include('partial.head', ['title' => 'Vehicle Order List'])
@include('partial.sidebar-em')

<x-main-container>
    <a href="/employee/vehicle-reservations/create" class="btn btn-info">Ajukan Kendaraan</a>
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
                <td>{{ match($item->is_approved) { 0 => 'no', 1 => 'yes', null => 'menunggu' } }}</td>
                <td>{{ $item->approved_date ?? 'belum ditentukan' }}</td>
                <td><a href="/employee/vehicle-reservations/{{ $item->id }}">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-main-container>

@include('partial.foot')