<div class="container">
    @if (Session::has('success'))
        <div class="notification is-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('warning'))
        <div class="notification is-warning">
            {{ Session::get('warning') }}
        </div>
    @endif

    @if (Session::has('danger'))
        <div class="notification is-danger">
            {{ Session::get('danger') }}
        </div>
    @endif
</div>
