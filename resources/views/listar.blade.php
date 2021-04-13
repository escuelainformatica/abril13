@extends('plantilla')
@yield('titulo','pagina de insertar')

@section('contenido')
    <h1>LISTADO</h1>
<ul>
    @foreach($listado as $item)
        <li>{{$item->titulo}} - <img style="width: 100px; height:100px;" src="/img/{{$item->imagen}}"/> {{$item->updated_at}}</li>
    @endforeach
</ul>


<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if($prev===null)
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        @else
            <li class="page-item"><a class="page-link" href="?pagina={{$prev}}">Previous</a></li>
        @endif
        @for($i=1;$i<=$numPaginas;$i++)
            <li class="page-item"><a class="page-link" href="?pagina={{$i}}">{{$i}}</a></li>
        @endfor
        @if($next===null)
            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
            @else
                <li class="page-item"><a class="page-link" href="?pagina={{$next}}">Next</a></li>
        @endif
    </ul>
</nav>

@endsection

