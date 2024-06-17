@include('partial.head', ['title' => 'vehicle approval list'])
@include('partial.sidebar-em')

<x-main-container>
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
            @foreach ($vehicle_approvals as $item)
            <tr>
                <td>{{ $item->orderer->name }}</td>
                <td>{{ $item->approver?->name }}</td>
                <td>{{ $item->vehicle->item_code }}</td>
                <td>{{ $item->vehicleDriver?->name }}</td>
                <td>{{ match($item->is_approved) { 0 => 'ditolak', 1 => 'diizinkan', null => 'menunggu' } }}</td>
                <td>{{ $item->approved_date ?? 'menunggu' }}</td>
                <td><a href="/employee/vehicle-approval/{{ $item->id }}">Detail @if ($item->is_approved === null) & Approve @endif</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-main-container>

@include('partial.foot')