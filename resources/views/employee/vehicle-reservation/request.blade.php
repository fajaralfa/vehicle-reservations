@include('partial.head', ['title' => 'Vehicle Order List'])
@include('partial.sidebar')

<x-main-container>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="/employee/vehicle-reservations" method="post">
        @csrf
        <div>
            <label for="vehicle">Select Vehicle</label>
            <select name="vehicle_id" id="">
                @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}">{{ "$item->brand $item->model" }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Request Vehicle</button>
    </form>
</x-main-container>

@include('partial.foot')
