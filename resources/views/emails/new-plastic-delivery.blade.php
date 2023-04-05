<x-mail::message>
Hola,

Gracias por gestionar responsablemente tus residuos plásticos.
<br><br>
Cada kilo que recuperamos representa tu compromiso y el de muchas personas que trabajamos para mitigar los efectos
que tiene el uso desmedido de productos plásticos.

<b>Recuerda, tan importante como reciclar, es evitar el uso de plásticos innecesarios.</b>
<br><br>

Se te sumaron <b>{{ $plasticDelivery->plasticoins()->sum('amount') }} plasticoins</b>.

<x-mail::table>
| Tipo de Plastico | Cantidad |
| :--------------: |:--------:|
| Plásticos Domiciliario | {{ $plasticDelivery->home_plastic_amount ?? '0' }} kg
| Plásticos de la playa | {{ $plasticDelivery->beach_plastic_amount ?? '0' }} kg
| Micro plásticos de la playa | {{ $plasticDelivery->micro_plastic_amount ?? '0' }} kg
</x-mail::table>

<x-mail::button :url="route('site.benefit.index')">
    Obtener Beneficios
</x-mail::button>

Que tengas un día genial.
<br><br>
Saludos,
<br>
Equipo de PlastiCoin
</x-mail::message>