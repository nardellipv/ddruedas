@extends('layouts.main')

@section('body', 'wp-automobile')

@section('css')
    <style>

        input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #d00000;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        }
    </style>
@endsection

@section('content')
    <div class="main-section">
        <div class="page-section"
             style="background:url({{ asset('styleWeb/assets/extra-images/user-bg-img.jpg') }}) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;"></div>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-user-account-holder">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-user-section-title">
                                        <h4>Publicar una nueva moto</h4>
                                    </div>
                                </div>
                                <form action="{{ route('dashboard.publicNew') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Información de la Moto</h6>
                                        </div>
                                    </div>

                                    @include('alerts.error')

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Marca</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select tabindex="1" name="brand"
                                                        class="chosen-select"
                                                        onchange="window.location.href=this.options[this.selectedIndex].value;">
                                                    @if(request()->input(['marca']))
                                                        <option value="{{ $brandName->id }}">{{ $brandName->name }}</option>
                                                    @else
                                                        <option value="">Seleccionar</option>
                                                    @endif
                                                    @if(isset($brands))
                                                        @foreach($brands as $brand)
                                                            <option value="{{ route('dashboard.selectPattern', ['marca'=>$brand->id]) }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Modelo</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select tabindex="1" name="pattern"
                                                        class="chosen-select">
                                                    @if(!isset($patterns))
                                                        <option value="">Seleccione un Modelo</option>
                                                    @else
                                                        @foreach($patterns as $pattern)
                                                            <option value="{{ $pattern->id }}">{{ $pattern->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Condición</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select tabindex="1" name="condition" class="chosen-select" id="select">
                                                    <option value="">Elegir</option>
                                                    <option {{ old('condition') == 'Usada' ? "selected" : "" }} value="Usada">
                                                        Usada
                                                    </option>
                                                    <option {{ old('condition') == 'Nueva' ? "selected" : "" }} value="Nueva">
                                                        0 Km.
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Tipo de Moto</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select tabindex="1" name="type"
                                                        class="chosen-select">
                                                    <option value="">Tipo de Moto</option>
                                                    @foreach($types as $type)
                                                        <option {{ old('type') == $type->id ? "selected" : "" }} value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Versión/Cilindrada</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="cs-field">
                                                <div class="cs-field">
                                                    <input type="text" name="version" placeholder="Versión - Ej. 800 R"
                                                           value="{{ old('version') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="cs-field">
                                                <input type="text" name="displacement"
                                                       placeholder="Cilindrada - Ej. 250"
                                                       value="{{ old('displacement') }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder year">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Año/Kilometraje</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="cs-field">
                                                <div class="cs-field">
                                                    <input type="text" name="year"
                                                           placeholder="Año - Ej. 2018"
                                                           value="{{ old('year') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="cs-field">
                                                <input type="text" name="mileage"
                                                       placeholder="Kilometraje - Ej. 4550"
                                                       value="{{ old('mileage') }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Combustible/Motor</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="cs-field">
                                                <div class="cs-field">
                                                    <select tabindex="1" name="fuel" class="chosen-select">
                                                        <option {{ old('fuel') == 'Nafta' ? "selected" : "" }} value="Nafta">
                                                            Nafta
                                                        </option>
                                                        <option {{ old('fuel') == 'Eléctrico' ? "selected" : "" }} value="Eléctrico">
                                                            Eléctrico
                                                        </option>
                                                        <option {{ old('fuel') == 'Otro' ? "selected" : "" }} value="Otro">
                                                            Otro
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="cs-field">
                                                <select tabindex="1" name="typeEngine" class="chosen-select">
                                                    <option value="">Seleccione</option>
                                                    <option {{ old('typeEngine') == '1' ? "selected" : "" }} value="1">2
                                                        Tiempos
                                                    </option>
                                                    <option {{ old('typeEngine') == '2' ? "selected" : "" }} value="2">4
                                                        Tiempos
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Precio</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="cs-field">
                                                <select tabindex="1" name="money" class="chosen-select">
                                                    <option {{ old('money') == '$' ? "selected" : "" }} value="$">$
                                                    </option>
                                                    <option {{ old('money') == 'U$S' ? "selected" : "" }} value="U$S">
                                                        U$S
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="cs-field">
                                                <input type="text" name="price"
                                                       placeholder="Ej. 15000"
                                                       value="{{ old('price') }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Equipamiento</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Seleccione los equipamiento</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <ul class="cs-checkbox-list">
                                                    @foreach($equipments as $equipment)
                                                        <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="cs-checkbox">
                                                                <input id="equipment{{ $equipment->id }}"
                                                                       type="checkbox"
                                                                       name="equipment[]"
                                                                       value="{{ $equipment->id }}"
                                                                        {{ (is_array(old('equipment')) and in_array($equipment->id, old('equipment'))) ? ' checked' : ''  }}>
                                                                <label for="equipment{{ $equipment->id }}">{{ $equipment->name }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Comentarios</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Observaciones</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                        <textarea name="comment"
                                                                  placeholder="Ej. Excelente estado">{{ old('comment') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Seleccione las formas de pago</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <ul class="cs-checkbox-list">
                                                    @foreach($payments as $payment)
                                                        <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="cs-checkbox">
                                                                <input id="payment{{ $payment->id }}" type="checkbox"
                                                                       name="payment[]"
                                                                       value="{{ $payment->id }}"
                                                                        {{ (is_array(old('payment')) and in_array($payment->id, old('payment'))) ? ' checked' : ''  }}>
                                                                <label for="payment{{ $payment->id }}">{{ $payment->name }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Imágenes de la moto</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-upload-img">
                                                <div class="cs-browse-holder">
                                                    <div class="field" align="left">
                                                        <input type="file" id="files" name="files[]" multiple/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cs-field-holder">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                            <div class="cs-field">
                                                <div class="cs-btn-submit">
                                                    <input type="submit" value="Publicar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#select').on('change', function () {
            var selectValor = $(this).val();

            if (selectValor == 'Nueva') {
                $('.year').hide();
            } else {
                $('.year').show();
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function (e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function (e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Eliminar</span>" +
                                "</span>").insertAfter("#files");
                            $(".remove").click(function () {
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            }
        });
    </script>
@endsection