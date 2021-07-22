@component('mail::message')
# Introduction

{{ $message }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,

{{ config('app.name') }}
@endcomponent