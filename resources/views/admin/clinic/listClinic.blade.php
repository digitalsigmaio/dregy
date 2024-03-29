@extends('admin.app')

@section('content')
<list-accounts 
    :account_url = "{{ json_encode($account_url) }}" 
    :account_name = "{{ json_encode($account_name) }}"
    :delete_url = "{{ json_encode($delete_url) }}" 
    :edit_url = "{{ json_encode($edit_url) }}"
    :admin = "{{ json_encode(Auth::user()) }}"
>
</list-accounts>
@endsection