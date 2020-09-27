@extends('layouts.main')

@section('body', 'wp-automobile')

@section('content')
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="content-area">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title alignleft">
                                        <h3>Preguntas Frecuentes</h3>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-faq-tabs">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Información
                                                    General</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Uso
                                                    del Sitio</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#messages" aria-controls="messages" role="tab"
                                                   data-toggle="tab">Publicar</a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="home">
                                                <div class="panel-group" id="accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <h6 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion" href="#collapseOne"
                                                                   aria-expanded="true" aria-controls="collapseOne">
                                                                    <span class="cs-color">P.</span>¿Donde se verá mi
                                                                    anuncio?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse collapse in"
                                                             role="tabpanel">
                                                            <div class="panel-body">
                                                                Generamos una plataforma en donde el usuario final puede
                                                                publicar su motocicleta para poder ofrecerla en el
                                                                mercado Argentino.
                                                                Esta plataforma esta disponible en todo el territorio
                                                                Argentino.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                            <h6 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse" data-parent="#accordion"
                                                                   href="#collapseTwo" aria-expanded="false"
                                                                   aria-controls="collapseTwo">
                                                                    <span class="cs-color">P.</span>¿Quien verá mi
                                                                    anuncio?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseTwo" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="headingTwo">
                                                            <div class="panel-body">
                                                                El sitio al ser publicado en todo el territorio
                                                                Argentino, cualquier persona que resida en el territorio
                                                                lo podrá ver.
                                                                El sitio también puede ser visitado por personas que se
                                                                encuentra fuera del territorio Argentino.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <div class="panel-group" id="accordion2" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading6">
                                                            <h6 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion2" href="#collapse6"
                                                                   aria-expanded="true" aria-controls="collapse6">
                                                                    <span class="cs-color">P.</span>¿Comó me registro?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse6" class="panel-collapse collapse in"
                                                             role="tabpanel">
                                                            <div class="panel-body">
                                                                En la parte superior derecha, encontraras el link <a
                                                                        href="{{ route('register') }}">Registrarse</a>,
                                                                al ingresar al formulario de registro, se deberan
                                                                completar todos los datos, los datos introducidos en el
                                                                registro, se mostrarán en el sitio web.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading7">
                                                            <h6 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse" data-parent="#accordion2"
                                                                   href="#collapse7" aria-expanded="false"
                                                                   aria-controls="collapse7">
                                                                    <span class="cs-color">P.</span>¿Comó ingreso al
                                                                    sitio?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse7" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading7">
                                                            <div class="panel-body">
                                                                En la parte superior derecha, encontraras el link <a
                                                                        href="{{ route('login') }}">Ingresar</a>, una
                                                                vez
                                                                se muestren los campos de email y contraseña, deberas
                                                                introducirlos, luego el sitio te llevará a tu cuenta
                                                                automáticamente.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading8">
                                                            <h6 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                   data-toggle="collapse" data-parent="#accordion2"
                                                                   href="#collapse8" aria-expanded="false"
                                                                   aria-controls="collapse8">
                                                                    <span class="cs-color">P.</span>¿Qué puedo hacer
                                                                    dentro de mi cuenta?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse8" class="panel-collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading8">
                                                            <div class="panel-body">
                                                                Una vez que hayas ingresado, el sitio te llevará
                                                                automáticamente a tu cuenta personal en donde podrás
                                                                realizar las siguiente acciones:
                                                                <ul>
                                                                    <li><i class="icon-check3"></i>Publicar una
                                                                        motocicleta.
                                                                    </li>
                                                                    <li><i class="icon-check3"></i>Ver el listado de
                                                                        motocicletas publicadas.
                                                                    </li>
                                                                    <li><i class="icon-check3"></i>Publicar un accesorio
                                                                        o repuesto para motos.
                                                                    </li>
                                                                    <li><i class="icon-check3"></i>Ver el listado de
                                                                        accesorios y/o repuestos publicados.
                                                                    </li>
                                                                    <li><i class="icon-check3"></i>Cambiar tus datos
                                                                        personales.
                                                                    </li>
                                                                    <li><i class="icon-check3"></i>Ver el listado de
                                                                        favoritos.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="messages">
                                                <div class="panel-group" id="accordion3" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading15">
                                                            <h6 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion3" href="#collapse15"
                                                                   aria-expanded="true" aria-controls="collapse15">
                                                                    <span class="cs-color">P.</span>¿Cuál es el costo
                                                                    por publicar una moto?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse15" class="panel-collapse collapse in"
                                                             role="tabpanel" aria-labelledby="heading15">
                                                            <div class="panel-body">
                                                                Ya sea que publiques una moto o un accesorio/repuesto,
                                                                estas publicaciones no tienen costo. Puedes publicar
                                                                la cantidad de avisos que necesites sin abonar
                                                                absolutamente nada al sitio.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading16">
                                                            <h6 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion3" href="#collapse16"
                                                                   aria-expanded="false" aria-controls="collapse16">
                                                                    <span class="cs-color">P.</span>¿Comó puedo publicar
                                                                    un artículo?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse16" class="panel-collapse collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading16">
                                                            <div class="panel-body">
                                                                Dentro de tu cuenta, en el listado de motos o
                                                                accesorios, verás un botón de publicar, una vez que se
                                                                preciona ese botón,
                                                                el sitio te lleva a un formulario donde deberas ingresar
                                                                los datos de la motocicleta o accesorio que quieres
                                                                vender.
                                                                Algunas recomendaciones para publicar:

                                                                <ul>
                                                                    <li><i class="icon-check3"></i>Ingresa los datos
                                                                        correctamente.
                                                                    </li>
                                                                    <li><i class="icon-check3"></i>El precio debe ser el
                                                                        correcto.
                                                                    </li>
                                                                    <li><i class="icon-check3"></i>Subir imágenes.</li>
                                                                    <li><i class="icon-check3"></i>Agregar comentarios
                                                                        bien descriptivos.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading17">
                                                            <h6 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion3" href="#collapse17"
                                                                   aria-expanded="false" aria-controls="collapse17">
                                                                    <span class="cs-color">P.</span>¿Comó activo mi
                                                                    publicación?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse17" class="panel-collapse collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading17">
                                                            <div class="panel-body">
                                                                Una vez que hayas publicado una motocicleta, el artículo
                                                                quedará en estado de pendiente. Un administrador
                                                                del sitio aprobará tu artículo y automáticamente la moto
                                                                quedará visible para el resto de los usuarios.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading17">
                                                            <h6 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion3" href="#collapse17"
                                                                   aria-expanded="false" aria-controls="collapse17">
                                                                    <span class="cs-color">P.</span>¿Cuanto dura mi
                                                                    publicación?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse17" class="panel-collapse collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading17">
                                                            <div class="panel-body">
                                                                Las publicaciones tiene una duración de 30 días
                                                                corridos, una vez que se cumpla el tiempo
                                                                la publicación quedará como vencida.
                                                                Para reactivar una publicación solo deberá ingresar al
                                                                apartado de vencidos dentro de
                                                                Mis Motos y reactivar la publicación.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="heading18">
                                                            <h6 class="panel-title">
                                                                <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion3" href="#collapse18"
                                                                   aria-expanded="false" aria-controls="collapse18">
                                                                    <span class="cs-color">P.</span>¿Comó edito una
                                                                    publicación?
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapse18" class="panel-collapse collapse collapse"
                                                             role="tabpanel" aria-labelledby="heading18">
                                                            <div class="panel-body">
                                                                Dentro del listado de Mis Motos, podrá encontrar los
                                                                links para editar un árticulo.
                                                                Una vez que se edite el ariculo este quedará en
                                                                pendiente esperando la aporbación de un
                                                                administrador del sitio.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="widget widget-text">
                            <h6>No encontre una respuesta</h6>
                            <p>Si no encontraste una respuesta a tu pregunta, puedes escribirnos cuando gustes y
                                trataremos de
                                solucionar tu problema lo antes posible.</p>
                            <a href="{{ route('contact') }}" class="contact-btn cs-color">Contactarnos</a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
