<p style="text-align: center;"><img src="https://dedosruedas.com.ar/styleWeb/assets/images/logo.png"/></p>
<table style="height: 28px; background-color: #f2f2f2; width: 538.5px; margin-left: auto; margin-right: auto;">
    <tbody>
    <tr>
        <td style="width: 528.5px; text-align: left;">
            <p>&nbsp;</p>
            <p style="padding-left: 30px;">Te han contactado desde dedosruedas.com.ar</p>
            <p style="padding-left: 30px;"><strong>Datos de contacto:</strong></p>
            <table style="width: 313px; height: 220px; margin-left: auto; margin-right: auto;">
                <tbody>
                <tr>
                    <td style="width: 144px;">Nombre:</td>
                    <td style="width: 153px;">{{ $request->name }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">EMail:</td>
                    <td style="width: 153px;">{{ $request->email }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Link publicación:</td>
                    <td style="width: 153px;">
                        <a href="https://dedosruedas.com.ar/shop/detalle/{{ $item->id }}">{{  $item->name }} </a>
                                </td>
                </tr>
                <tr>
                    <td style=" width: 144px;">Fecha de envio del Mail:
                    </td>
                    <td style="width: 153px;">{{ \Carbon\Carbon::now()->format('d/m/Y H:m') }}Hs.</td>
                </tr>
                </tbody>
            </table>
            <p style="text-align: center;">Mensaje:</p>
            <p style="text-align: center;"><b>{!! $request->messageSeller !!}</b></p>
            <p>&nbsp;</p>
            <p style="text-align: center;"><span style="color: #993300;">Gracias por utilizar dedosruedas.com.ar</span>
            </p>
            <hr/>
            <p style="padding-left: 30px;"><sub>Por favor no responda este mail, para sugerencias o dudas, escribir a <a
                            href="mailto:info@dedosruedas.com.ar">info@dedosruedas.com.ar</a></sub></p>
        </td>
    </tr>
    </tbody>
</table>