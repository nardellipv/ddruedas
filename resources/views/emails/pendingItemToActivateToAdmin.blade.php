<p style="text-align: center;"><img src="https://dedosruedas.com.ar/styleWeb/assets/images/logo.png"/></p>
<table style="height: 28px; background-color: #f2f2f2; width: 538.5px; margin-left: auto; margin-right: auto;">
    <tbody>
    <tr>
        <td style="width: 528.5px; text-align: left;">
            <p>&nbsp;</p>
            <p style="padding-left: 30px;">Item pendiente de aprobación</p>
            <p style="padding-left: 30px;">Se acaba de publicar el siguiente item
                <a href="https://dedosruedas.com.ar/listado/detalle/{{ $item->id }}"><strong>{{ $item->brand->name }} {{ $item->pattern->name }}
                        {{ $item->displacement }}</strong></a>
            </p>
            <p style="padding-left: 30px;"><strong>Datos técnicos:</strong></p>
            <table style="width: 313px; height: 220px; margin-left: auto; margin-right: auto;">
                <tbody>
                <tr>
                    <td style="width: 144px;">Moneda:</td>
                    <td style="width: 153px;">{{ $item->money }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Precio:</td>
                    <td style="width: 153px;">{{ $item->price }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Condición:</td>
                    <td style="width: 153px;">{{ $item->condition }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Cilindradas:</td>
                    <td style="width: 153px;">{{ $item->displacement }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Año:</td>
                    <td style="width: 153px;">{{ $item->year }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Tipo:</td>
                    <td style="width: 153px;">{{ $item->type->name }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Kilometraje:</td>
                    <td style="width: 153px;">{{ $item->mileage }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Combustible:</td>
                    <td style="width: 153px;">{{ $item->fuel }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Motor:</td>
                    <td style="width: 153px;">{{ $item->typeEngine }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Permuta:</td>
                    <td style="width: 153px;">{{ $item->barter }}</td>
                </tr>
                <tr>
                    <td style="width: 144px;">Envio del Mail:</td>
                    <td style="width: 153px;">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</td>
                </tr>
                </tbody>
            </table>
                <p style="text-align: center;">Comentarios:</p>
                <p style="text-align: center;">{!! $item->comment !!}</p>
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