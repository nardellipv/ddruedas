@if (count($errors) > 0)
    <div class="alert alert-warning alert-dismissable"  style="text-align: center;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon-warning3" style="font-size: 20px"></i>
        <span style="font-size: 20px"> Por favor verifique los siguientes errores </span>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="list-style: none;"> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif