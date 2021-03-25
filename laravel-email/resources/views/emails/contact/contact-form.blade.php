@component('mail::message')
# Email

site: {{ config('app.name') }}

email: {{ $contact['email'] }}<br>
msg: {{ $contact['msg'] }}

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
