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
                                        <h4>Publicar un nuevo Accesorio</h4>
                                    </div>
                                </div>
                                <form action="{{ route('actionAccessory.update', $accessory) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">

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
                                                    @if(isset($brandName))
                                                        <option value="{{ $brandName->id }}">{{ $brandName->name }}</option>
                                                    @else
                                                        <option value="{{ $accessory->brand->id }}">{{ $accessory->brand->name }}</option>
                                                    @endif
                                                    <option disabled>------------------------</option>
                                                    @if(isset($brands))
                                                        @foreach($brands as $brand)
                                                            <option value="{{ route('actionAccessory.selectPatternEdit', ['marca'=>$brand->id, 'accesorio' => $accessory]) }}">{{ $brand->name }}</option>
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
                                                    @if(request()->input(['marca']))
                                                        <option value="">Seleccione un Modelo</option>
                                                        <option disabled>---------------------</option>
                                                        @else
                                                        <option value="{{ $accessory->pattern->id }}">{{ $accessory->pattern->name }}</option>
                                                    @endif
                                                    @if(isset($patterns))
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
                                                    <option value="{{ $accessory->condition }}">{{ $accessory->condition }}</option>
                                                    <option {{ old('condition') == 'Usado' ? "selected" : "" }} value="Usado">
                                                        Usado
                                                    </option>
                                                    <option {{ old('condition') == 'Nuevo' ? "selected" : "" }} value="Nuevo">
                                                        Nuevo
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Categoría</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select tabindex="1" name="category"
                                                        class="chosen-select">
                                                    <option value="{{ $accessory->category->id }}">{{ $accessory->category->name }}</option>
                                                    <option disabled>------------------------</option>
                                                    @foreach($categories as $category)
                                                        <option {{ old('category') == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Nombre del producto</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="name"
                                                       value="{{ $accessory->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Precio
                                                <small>en pesos</small>
                                            </label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="price"
                                                       placeholder="Ej. 15000"
                                                       value="{{ $accessory->price }}">
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
                                            <label>Observaciones del accesorio</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                        <textarea name="comment"
                                                                  placeholder="Ej. Excelente estado">{{ $accessory->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Imágenes del accesorio</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-upload-img">
                                                @if(isset($accessory->picture))
                                                    <a href="{{ route('actionAccessory.deleteFile', $accessory) }}">
                                                        <img src="{{ asset('styleWeb/assets/images/cross.png') }}"
                                                             style="margin-left: 40%;">
                                                    </a>
                                                    <img src="{{ asset('users/'.$accessory->user_id.'/images/accessory/700x700-'.$accessory->picture) }}"
                                                         class="img-responsive" style="width: 40%">
                                                @else
                                                    <img src="{{ asset('styleWeb/assets/images/sinimagen.jpg') }}"
                                                         class="img-responsive" style="width: 40%">
                                                @endif
                                                <div class="cs-browse-holder">
                                                    <div class="field" align="left">
                                                        <input type="file" id="files" name="files"/>
                                                        <small>solo se permite una imagen.</small>
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