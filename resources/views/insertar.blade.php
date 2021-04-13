<form method="post" enctype="multipart/form-data">
    @csrf
    titulo:<input type="text" name="titulo" value="{{$post->titulo}}" /><br/>
    descripcion:<input type="text" name="descripcion" value="{{$post->descripcion}}" /><br/>
    imagen:<input type="file" name="imagen" value="{{$post->imagen}}" /><br/>
    <input type="submit" value="Insertar"/>




</form>
