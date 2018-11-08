@component('mail::message')
# Dear Mr.{{$freeAd->user->name}},

Your Job Ad has been {{$freeAd->approved}}

@component('mail::button', ['url' => ''])
review It
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
