@include('partial.head', ['title' => 'Vehicle Order List'])
@include('partial.sidebar')

<x-main-container>
    <div>orderer {{ $vehicleReservation->orderer->name }}</div>
    <form action="/admin/vehicle-reservations/{{ $vehicleReservation->id }}/process" method="post">
        @csrf
        <label for="">Select Driver</label>
        <select name="vehicle_driver_id" id="">
        @foreach ($vehicleDrivers as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
        </select><br>
        <label for="">Select Approver</label>
        <select name="approver_id" id="">
        @foreach ($approvers as $item)
            <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->level }}</option>
        @endforeach
        </select>
        <button type="submit">Process</button>
    </form>
</x-main-container>

@include('partial.foot')