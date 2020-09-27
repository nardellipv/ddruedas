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
                                <form action="{{ route('action.publicNewAccessory') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

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
                                                            <option value="{{ route('action.selectPattern', ['marca'=>$brand->id]) }}">{{ $brand->name }}</option>
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
                                                    <option value="">Categoría</option>
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
                                                       placeholder="Ej. Faro delantero"
                                                       value="{{ old('name') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Precio <small>en pesos</small></label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="price"
                                                       placeholder="Ej. 15000"
                                                       value="{{ old('price') }}">
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
                                                                  placeholder="Ej. Excelente estado">{{ old('comment') }}</textarea>
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