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
                                        <h4>Editar publicación {{ $item->brand->name }}</h4>
                                    </div>
                                </div>
                                <form action="{{ route('actionItems.update', $item) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">
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
                                                        <option value="{{ $item->brand->id }}">{{ $item->brand->name }}</option>
                                                        <option disabled>-----------------------</option>
                                                    @endif
                                                    @if(isset($brands))
                                                        @foreach($brands as $brand)
                                                            <option value="{{ route('actionItems.selectPattern', ['marca'=>$brand->id, 'itemId'=>$item]) }}">{{ $brand->name }}</option>
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
                                                        <option value="{{ $item->pattern->id }}">{{ $item->pattern->name }}</option>
                                                        <option disabled>-----------------------</option>
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
                                                    <option value="{{ $item->condition }}">{{ $item->condition }}</option>
                                                    <option disabled>-----------------------</option>
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
                                                    <option value="{{ $item->type->id }}">{{ $item->type->name }}</option>
                                                    <option disabled>-----------------------</option>
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
                                                           value="{{ $item->version, old('version') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="cs-field">
                                                <input type="text" name="displacement"
                                                       placeholder="Cilindrada - Ej. 250"
                                                       value="{{ $item->displacement, old('displacement') }}">
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
                                                           value="{{ $item->year, old('year') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="cs-field">
                                                <input type="text" name="mileage"
                                                       placeholder="Kilometraje - Ej. 4550"
                                                       value="{{ $item->mileage, old('mileage') }}">
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
                                                        <option value="{{ $item->fuel }}">{{ $item->fuel }}</option>
                                                        <option disabled>-----------------------</option>
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
                                                    <option value="{{ $item->typeEngine }}">{{ $item->typeEngine }}</option>
                                                    <option disabled>-----------------------</option>
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
                                                    <option value="{{ $item->money }}">{{ $item->money }}</option>
                                                    <option disabled>-------</option>
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
                                                       value="{{ $item->price, old('price') }}">
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
                                                    @if(isset($equipmentItems))
                                                        @foreach($equipmentItems as $equipmentItem)
                                                            <ul>
                                                                <li class="col-lg-6 col-md-6">
                                                                    <div class="cs-listing-icon">
                                                                        <ul>
                                                                            <li class="available">
                                                                                <a href="{{ route('actionItems.selectPattern', ['remover-equipamiento'=>$equipmentItem,'marca'=>$brand->id, 'itemId'=>$item]) }}">
                                                                                    <small>{{ $equipmentItem->equipment->name }}</small>
                                                                                    <img src="{{ asset('styleWeb/assets/images/cross.png') }}"
                                                                                         style="margin-bottom: 20px;">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                    @endif

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
                                                                  placeholder="Ej. Excelente estado">{{ $item->comment, old('comment') }}</textarea>
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
                                                    @if(isset($itemPayments))
                                                        @foreach($itemPayments as $itemPayment)
                                                            <ul>
                                                                <li class="col-lg-6 col-md-6">
                                                                    <div class="cs-listing-icon">
                                                                        <ul>
                                                                            <li class="available">
                                                                                <a href="{{ route('actionItems.selectPattern', ['remover-pagos'=>$itemPayment,'marca'=>$brand->id, 'itemId'=>$item]) }}">
                                                                                    <small>{{ $itemPayment->payment->name }}</small>
                                                                                    <img src="{{ asset('styleWeb/assets/images/cross.png') }}"
                                                                                         style="margin-bottom: 20px;">
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                    @endif

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
                                                @if(count($itemPictures)>=1)
                                                    <ul>
                                                        @foreach($itemPictures as $itemPicture)
                                                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <a href="{{ route('actionItems.selectPattern', ['remover-imagen'=>$itemPicture,
                                                                'marca'=>$brand->id,
                                                                'itemId'=>$item]) }}">
                                                                    <img src="{{ asset('styleWeb/assets/images/cross.png') }}"
                                                                         style="margin-left: 67%;">
                                                                </a>
                                                                <img src="{{ asset('users/'. Auth::user()->id . '/images/items/700x700-'. $itemPicture->name) }}"
                                                                     class="img-responsive" style="width: 70%">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                         class="img-responsive" style="width: 40%">
                                                @endif
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
                                                    <input type="submit" value="Actualizar">
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