<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Items pendiente de aprobación</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Item</th>
                                    <th>Precio</th>
                                    <th>Km.</th>
                                    <th>Condición</th>
                                    <th>Rechazo</th>
                                    <th>Aprobar</th>
                                </tr>
                                @foreach($items as $item)
                                    <tr>
                                        <td><a href="{{ route('item.detail', $item) }}"
                                               target="_blank">{{ $item->brand->name }} {{ $item->pattern->name }} {{ $item->displacement }}</a>
                                        </td>
                                        <td>{{ $item->money }} {{ $item->price }}</td>
                                        <td>{{ $item->mileage }}</td>
                                        <td>{{ $item->condition }}</td>
                                        <td>
                                            <form action="{{ route('item.itemNoOk', $item) }}" method="get">
                                                <input type="text" name="nook"><button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('item.itemOk', $item) }}" class="btn btn-icon btn-success"><i class="fas fa-check"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>