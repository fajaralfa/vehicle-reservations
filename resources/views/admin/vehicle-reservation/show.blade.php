@include('partial.head', ['title' => 'Vehicle Order Detail'])
@include('partial.sidebar')

<x-main-container>
    <div id="reservation-data" class="list-group">
        <div class="list-group-item fw-bold">Orderer</div>
        <div class="list-group-item">
            <div>
                <span>Name</span>
                <span>{{ $vehicleReservation->orderer->name }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Position</span>
                <span>{{ $vehicleReservation->orderer->level }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">Approver</div>
        <div class="list-group-item">
            <div>
                <span>Name</span>
                <span>{{ $vehicleReservation->approver?->name }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Position</span>
                <span>{{ $vehicleReservation->approver?->level }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">Admin</div>
        <div class="list-group-item">
            <div>
                <span>Username</span>
                <span>{{ $vehicleReservation->admin?->username }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">Driver</div>
        <div class="list-group-item">
            <div>
                <span>Name</span>
                <span>{{ $vehicleReservation->vehicleDriver?->name }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">Vehicle</div>
        <div class="list-group-item">
            <div>
                <span>Code</span>
                <span>{{ $vehicleReservation->vehicle->item_code }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Brand</span>
                <span>{{ $vehicleReservation->vehicle->brand }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Model</span>
                <span>{{ $vehicleReservation->vehicle->model }}</span>
            </div>
        </div>
        <div class="list-group-item fw-bold">Approval</div>
        <div class="list-group-item">
            <div>
                <span>Approved</span>
                <span>{{ match($vehicleReservation->is_approved) { false => 'no', true => 'yes', null => 'pending' } }}</span>
            </div>
        </div>
        <div class="list-group-item">
            <div>
                <span>Approval Date</span>
                <span>{{ $vehicleReservation->approved_date ?? 'waiting' }}</span>
            </div>
        </div>
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
