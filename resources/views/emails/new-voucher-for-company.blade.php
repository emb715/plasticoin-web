<x-mail::message>
Hola {{ $voucher->company->name }},

Se ha creado un nuevo voucher para tu empresa. 
<br><br>
*Usuario*: {{ $voucher->user->name }} ({{ $voucher->user->email }})
<br>
*Beneficio*: {{ $voucher->benefit->name }} {{ !is_null($voucher->benefit->promotion) ? '(' . $voucher->benefit->promotion . ')' : '' }}
<br>
*Plasticoins*: {{ $voucher->benefit->value }}
<br>
*Código*: {{ $voucher->code }}
<br>
*Válido hasta*: {{ $voucher->valid_until->format('d/m/Y g:i:s') }}
<br><br>
Gracias por tu apoyo, recuerda que ofreciendo beneficios  ayudas a que los residuos plásticos tengan una correcta disposición en cadenas de reciclaje.

<br>
Que tengas un día genial.
<br><br>
Saludos,
<br>
Equipo de PlastiCoin
</x-mail::message>
