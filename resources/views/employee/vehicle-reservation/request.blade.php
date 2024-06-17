@include('partial.head', ['title' => 'Vehicle Order List'])
@include('partial.sidebar-em')

<x-main-container>
    <form action="/employee/vehicle-reservations" method="post" class="p-5">
        @csrf
        <div class="list-group p-3" style="width: 30rem;">
            <div class="list-group-item">
                <label for="vehicle">Select Vehicle</label>
                <select name="vehicle_id" id="vehicle_id" class="form-select">
                    @foreach ($vehicles as $item)
                        <option value="{{ $item->id }}">{{ "$item->brand $item->model" }}</option>
                    @endforeach
                </select>
            </div>
            <div class="list-group-item">
            <button type="submit" class="btn btn-info w-100">Request Vehicle</button>
            </div>
        </div>
    </form>
</x-main-container>

@include('partial.foot')
