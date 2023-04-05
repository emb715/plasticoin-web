<x-mail::message>
# Nueva contacto de Empresa

<x-mail::table>
| Campo | Información |
| :--------------: |:--------:|
| Nombre | {{ $data['name'] }} |
| Email | {{ $data['email'] }} |
| Teléfono | {{ $data['phone'] }} |
| Empresa | {{ $data['company'] }} |
| Ciudad | {{ $data['city'] }} |
| Mensaje | {{ $data['message'] }} |
</x-mail::table>

Que tengas un día genial.
<br><br>
Saludos,
<br>
Equipo de PlastiCoin
</x-mail::message>
