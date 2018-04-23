@component('mail::message')
# Introduction

The body of your message.

- one
- two
- three

@component('mail::button', ['url' => 'https://goober.com'])
Button Text
@endcomponent

@component('mail::panel')
Some inspirational quote :-)
@endcomponent

@component('mail::table')
@endcomponent

Thanks,<br>
Signed, the {{ config('app.name') }}'s
@endcomponent
