@if(Auth::guard('web')->check())
    <p>
        You are logged in as a <strong>{{ __('words.user') }}</strong>
    </p>

    @else

    <p>
        You are logged out as a <strong>{{ __('words.user') }}</strong>
    </p>
@endif

@if(Auth::guard('admin')->check())
    <p>
        You are logged in as an <strong>Admin</strong>
    </p>

@else

    <p>
        You are logged out as an <strong>Admin</strong>
    </p>
@endif