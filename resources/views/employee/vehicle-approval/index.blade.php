@include('partial.head', ['title' => 'vehicle approval list'])
@include('partial.sidebar-em')

<x-main-container>
    <table class="table overflow-x-scroll">
        <thead>
            <tr>
                <th>Orderer</th>
                <th>Approver Name</th>
                <th>Vehicle Code</th>
                <th>Driver Name</th>
                <th>Approved</th>
                <th>Approval Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicle_approvals as $item)
            <tr>
                <td>{{ $item->orderer->name }}</td>
                <td>{{ $item->approver?->name }}</td>
                <td>{{ $item->vehicle->item_code }}</td>
                <td>{{ $item->vehicleDriver?->name }}</td>
                <td>{{ match($item->is_approved) { 0 => 'no', 1 => 'yes', null => 'pending' } }}</td>
                <td>{{ $item->approved_date ?? 'waiting' }}</td>
                <td><a href="/employee/vehicle-approval/{{ $item->id }}">Detail @if ($item->is_approved === null) & Approve @endif</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-main-container>

@include('partial.foot')