<script>
    $(document).ready(function () {
        $('#alternar-respuesta-ej1').on('click', function () {
            $('#respuesta-ej1').toggle();
        });
    });
</script>
<aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top: 7%">
    <div class="cs-category-link-icon">
        <ul>
            <li><a href="#contact"><i class="cs-color icon-question-circle"></i>Contacto Vendedor</a></li>
            <li><a href="{{ route('item.PdfDetail', $item) }}"><i
                            class="cs-color icon-print3"></i>Descargar Ficha</a></li>
            <li><a data-toggle="modal"
                   href="http://chimpgroup.com/themeforest/automobile/remote.html"
                   data-target="#email-to-friend"><i class="cs-color icon-mail5"></i>Enviar por Email</a></li>
            <li>
                <a href="https://facebook.com/sharer/sharer.php?u=https://dedosruedas.com.ar/listado/detalle/{{ $item->id }}"
                   target="_blank">
                    <i class="cs-color icon-facebook"></i>Compartir Facebook</a></li>
            @if($item->user->phoneWsp == 1)
                <li>
                    <a class="resp-sharing-button__link"
                       href="https://web.whatsapp.com/send?phone=549{{ $item->user->phone }}&text=Hola%2C%20te%20escribo%20por%20tu%20{{ $item->brand->name }}%20{{ $item->pattern->name }}%20publicado%20en%20dedosruedas.com.ar%20Link-%3E%20%20https://dedosruedas.com.ar/listado/detalle/{{ $item->id }}"
                       target="_blank" rel="noopener" aria-label="">
                        <i class="cs-color icon-whatsapp2"></i>Contacto por Whatsapp</a>
                </li>
            @endif
            <li>
                <a href="#" id="alternar-respuesta-ej1">
                    <i class="cs-color icon-phone"></i>Ver Teléfono</a>
                <span id="respuesta-ej1" style="display:none; margin-left: 20%">
                    {{ $item->user->phone }}
                </span>
            </li>
        </ul>
        <div class="cs-form-modal">
            <div class="modal fade" id="email-to-friend" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Enviar artículo por email</h4>
                            <div class="cs-login-form">
                                <form action="{{ route('email.sendItem') }}" class="row">
                                    <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="cs-modal-field">
                                            <label for="cs-username-7">
                                                <strong>Nombre</strong>
                                                <i class="icon-user-plus2"></i>
                                                <input type="text" name="name" id="cs-username-7"
                                                       placeholder="Ingresar Nombre" value="{{ old('name') }}" required>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="cs-modal-field">
                                            <label for="cs-email-7">
                                                <strong>Email</strong>
                                                <i class="icon-envelope"></i>
                                                <input type="email" name="email" id="cs-email-7"
                                                       placeholder="Ingresar Email" value="{{ old('email') }}" required>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="cs-modal-field">
                                            <label>
                                                <textarea name="comment"
                                                          placeholder="Ingresar algun comentario">{{ old('comment') }}</textarea>
                                            </label>
                                        </div>
                                    </div>
                                    <input name="itemId" value="{{ $item->id }}" hidden>
                                    <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="cs-modal-field">
                                            <div class="cs-media">
                                                {!! htmlFormSnippet() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="cs-modal-field">
                                            <input class="cs-color csborder-color" type="submit"
                                                   value="Enviar">
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

    @if($item->user->dealer)
        <div class="cs-tabs-holder">
            <div class="cs-location-tabs">
                <div class="cs-tabs horizontal vertical">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home"><i
                                        class="icon-location-pin"></i>Ubicación</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <iframe
                                    width="100%"

                                    height="450px"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD7eUalpQrZ5TA9BrE5XgsudugZC7TIPYo
                                        &q={{ $item->user->dealer->address .','. $item->user->region->name . $item->user->province->name}}"
                                    allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="auto-detail-filter">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- DedosItemDetalle -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-7543412924958320"
             data-ad-slot="9292650098"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</aside>