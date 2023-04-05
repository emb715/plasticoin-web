<x-mail::message>
Hola {{ $voucher->user->first_name }},

Se ha creado un nuevo voucher. Disfrutá de tu {{ $voucher->benefit->name }} en {{ $voucher->company->name }} con el siguiente código:

<b>{{ $voucher->code }}</b>
<br><br>
@if(is_null($voucher->benefit->promotion))
Muchas gracias por tu elección, recorda que es válido hasta el {{ $voucher->valid_until->format('d/m/Y g:i:s') }}.
@else
Muchas gracias por tu elección, recorda que es válido hasta el {{ $voucher->valid_until->format('d/m/Y g:i:s') }} para los productos: {{  $voucher->benefit->promotion }}.
@endif

<br>
Que tengas un día genial.
<br><br>
Saludos,
<br>
Equipo de PlastiCoin
</x-mail::message>
