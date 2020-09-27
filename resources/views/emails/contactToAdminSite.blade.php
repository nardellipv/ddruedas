<p style="text-align: center;"><img src="https://dedosruedas.com.ar/styleWeb/assets/images/logo.png"/></p>
<table style="height: 28px; background-color: #f2f2f2; width: 538.5px; margin-left: auto; margin-right: auto;">
    <tbody>
    <tr>
        <td style="width: 528.5px; text-align: left;">
            <p>&nbsp;</p>
            <p style="padding-left: 30px;">Mail desde pagina de contacto dedosruedas</p>
            <p style="padding-left: 30px;"><strong>Datos:</strong></p>
            <table style="width: 313px; height: 220px; margin-left: auto; margin-right: auto;">
                <tbody>
                <tr>
                    <td style="width: 144px;">Nombre:</td>
                    <td style="width: 153px;">{{ $request->name }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Email:</td>
                    <td style="width: 153px;">{{ $request->email }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Fecha de envío:</td>
                    <td style="width: 153px;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</td>
                </tr>
                </tbody>
            </table>
                <p style="text-align: center;">Comentarios:</p>
                <p style="text-align: center;">{!! $request->comment !!}</p>
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