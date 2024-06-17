@include('partial/head', [
    'title' => 'Login',
])

<div class="container-sm p-5">
    <div class="mb-5">
        <h1 class="fs-2">Welcome <span class="login-role"></span></h1>
        <button class="btn btn-link" onclick="toggleLogin()">Login as <span class="login-role-opposite"></span></button>
        @include ('partial.error')
    </div>
    <form action="/employee/login" id="login-form" method="post" style="width: 25rem">
        @csrf
        <input type="text" name="username" id="username" placeholder="username" class="form-control mb-3">
        <input type="password" name="password" id="password" placeholder="******" class="form-control mb-3">
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script>
    let loginProps = {
        'admin': {
            'role': 'Admin',
            'action': '/admin/login',
        },
        'employee': {
            'role': 'Employee',
            'action': '/employee/login',
        },
    }

    let currentPage = ''
    function toggleLogin() {
        const loginRole = document.querySelector('.login-role')
        const loginRoleOpposite = document.querySelector('.login-role-opposite')
        const loginForm = document.querySelector('#login-form')

        currentPage = (currentPage == 'employee' ? 'admin' : 'employee')

        const props = loginProps[currentPage];

        document.title = `Login ${props.role}`
        loginRole.innerText = props.role
        loginRoleOpposite.innerText = props.role == 'Admin' ? 'Employee' : 'Admin'
        loginForm.action = props.action
    }
    toggleLogin()
</script>

@include('partial/foot')