<p><img src="https://dedosruedas.com.ar/styleWeb/assets/images/logo.png" alt="" width="196" height="24" /></p>
<hr />
<p>Reporte de usuarios registrados&nbsp;</p>
<p><strong>Cantidad de usuarios:</strong> {{ $userCount }}</p>
<p>

<table style="height: 77px; margin-left: auto; margin-right: auto;" border="1" width="480">
    <tbody>
        <tr style="background-color: #00f000;">
            <td>email</td>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>Saludos,&nbsp;</p>
<p>dedosruedas.com.ar</p>
<hr />
<p><sub><span style="color: #ff0000;">Este mail fue generado automáticamente, por favor no responda este
            email.</span></sub></p>
