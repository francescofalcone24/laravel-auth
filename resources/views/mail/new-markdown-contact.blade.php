<x-mail::message>
	# Ciao Francesco!

	Hai ricevuto un nuovo messaggio, ecco qui i dettagli:
	Nome: {{ $lead->name }}
	Email: {{ $lead->email }}
	Messaggio:
	{{ $lead->message }}
	Data: {{ $lead->date }}





	Thanks,
	Il tuo Portfolio
</x-mail::message>
