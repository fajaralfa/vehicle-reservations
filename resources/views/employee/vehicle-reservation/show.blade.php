@include('partial.head', ['title' => 'Vehicle Order Detail'])
@include('partial.sidebar-em')

<x-main-container>
    <a href="/employee/vehicle-reservations">Kembali</a>
    <h1 class="fs-2 text-center">Rincian Pemesanan Kendaraan</h1>
    
    <div id="reservation-data" class="list-group p-4">
        <div class="list-group-item fw-bold">Perizinan</div>
        <div class="list-group-item">
            <div>
                <span>Status Perizinan</span>
                <span>{{ match ($vehicleReservation->is_approved) {0 => 'tidak',1 => '',null => 'Menunggu'} }}
                    Diizinkan</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Tanggal Keputusan</span>
                <span>{{ $vehicleReservation->approved_date ?? 'Menunggu' }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">Pemesan</div>
        <div class="list-group-item">
            <div>
                <span>Nama</span>
                <span>{{ $vehicleReservation->orderer->name }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Jabatan</span>
                <span>{{ $vehicleReservation->orderer->level }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">Kendaraan</div>
        <div class="list-group-item">
            <div>
                <span>Kode Kendaraan</span>
                <span>{{ $vehicleReservation->vehicle->item_code }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Merek</span>
                <span>{{ $vehicleReservation->vehicle->brand }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Model</span>
                <span>{{ $vehicleReservation->vehicle->model }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">
            <div>
                <span>Pemberi Izin</span>
                @if ($vehicleReservation->approver === null) <span>Belum Ditentukan</span> @endif
            </div>
        </div>
        @if ($vehicleReservation->approver !== null)
        <div class="list-group-item">
            <div>
                <span>Nama</span>
                <span>{{ $vehicleReservation->approver?->name }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Jabatan</span>
                <span>{{ $vehicleReservation->approver?->level }}</span>
            </div>
        </div>
        @endif
        <div class="list-group-item fw-bold">
            <div>
                <span>Admin Pemroses</span>
                @if ($vehicleReservation->admin === null) <span>Belum Ditentukan</span> @endif
            </div>
        </div>
        @if ($vehicleReservation->admin !== null)
        <div class="list-group-item">
            <div>
                <span>Username</span>
                <span>{{ $vehicleReservation->admin?->username }}</span>
            </div>
        </div>
        @endif
        <div class="list-group-item fw-bold">
            <div>
                <span>Pengemudi</span>
                @if ($vehicleReservation->vehicleDriver === null) <span>Belum Ditentukan</span> @endif
            </div>
        </div>
        @if ($vehicleReservation->vehicleDriver !== null)
        <div class="list-group-item">
            <div>
                <span>Nama</span>
                <span>{{ $vehicleReservation->vehicleDriver?->name }}</span>
            </div>
        </div>
        @endif
    </div>
</x-main-container>

<style>
    #reservation-data .list-group-item div {
        display: flex;
        justify-content: space-between;
    }

    #reservation-data .list-group-item div * {
        width: 50%;
    }
</style>

@include('partial.foot')
