
<ul>
    @foreach($listado as $item)
        <li>{{$item->titulo}} - <img style="width: 100px; height:100px;" src="/img/{{$item->imagen}}"/> {{$item->updated_at}}</li>
    @endforeach
</ul>
<ul>
    @for($i=1;$i<=$numPaginas;$i++)
    <li><a href="?pagina={{$i}}">{{$i}}</a></li>
    @endfor

</ul>

