@component('mail::message')
Welcome to Save our Schools Network!

The body of your message.

@component('mail::button', ['url' => 'dev:8000'])
	Back to SOS
@endcomponent

@component('mail::panel', ['url' => 'dev:8000'])
	Lorem Ipsum dolar sit amet.
@endcomponent

Thanks,<br>
	SOS Network
@endcomponent
