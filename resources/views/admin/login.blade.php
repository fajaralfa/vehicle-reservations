@include('partial/head')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/admin/login" method="post">
    @csrf
    <input type="text" name="username" id="">
    <input type="password" name="password" id="">
    <button type="submit">Login</button>
</form>

@include('partial/foot')