@include('partial.head', ['title' => 'Proses Pemesanan Kendaraan'])
@include('partial.sidebar')

<x-main-container>
    <h1 class="fs-2 ps-3">Proses Pemesanan Kendaraan</h1>
    <form action="/admin/vehicle-reservations/{{ $vehicleReservation->id }}/process" method="post">
        @csrf
        <div class="list-group p-3" style="width: 45rem;">
            <div class="list-group-item">Pemesan : {{ $vehicleReservation->orderer->name }}</div>
            <div class="list-group-item">
                <select name="vehicle_driver_id" id="vehicle_driver_id" class="form-select">
                    <option selected>Pilih Pengemudi</option>
                    @foreach ($vehicleDrivers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list-group-item">
                <select name="approver_id" id="approver_id" class="form-select">
                    <option>Pilih Pemberi Izin</option>
                    @foreach ($approvers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->level }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list-group-item">
                <button type="submit" class="btn w-100">Proses</button>
            </div>
        </div>
    </form>
</x-main-container>

@include('partial.foot')
