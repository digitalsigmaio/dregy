@component('mail::message')
# Dear Mr.{{$freeAd->user->name}},

Your Ad has been "{{ ($freeAd->approved) ? 'approved' : 'decined'}}" {{ !$reason ? "due to $reason" : "."}}


@component('mail::button', ['url' => '/'])
Review It
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
