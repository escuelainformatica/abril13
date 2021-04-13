<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function Listar(Request $req) {
        $paginaActual=$req->get('pagina');
        if($paginaActual===null) {
            $paginaActual=1;
        }
        // pagina 1 = saltarme 0 elemento.  1-1 =0 *5 =0
        // pagina 2 = saltarme 5 elementos  2-1 = 1*5 = 5
        // pagina 3 = saltarma 10 elementos  3-1 = 2*5 = 10

        //$listado= Post::take(2)->get();
        $listado= Post::orderByDesc('created_at')->skip(($paginaActual-1)*5)->take(5)->get();

        $numPaginas=ceil( Post::count() /5) ; // 5 es el tamaño de la pagina
        if($numPaginas>10) {
            $numPaginas=10; // limita que no se muestre mas 10 paginas.
        }


        return view("listar",['listado'=>$listado,'numPaginas'=>$numPaginas]);
    }
    public function InsertarGet() {
        $post=new Post();
        return view('insertar',['post'=>$post]);
    }
    public function InsertarPost(Request $req) {
        $post=new Post();
        // en config/filesystems.php
        /*
            'disks' => [

                'local' => [
                    'driver' => 'local',
                    'root' => public_path(''),
                ],

                'public' => [
                    'driver' => 'local',
                    'root' => public_path(''),
                    'url' => env('APP_URL').'/storage',
                    'visibility' => 'public',
                ],
         */
        $post->titulo=$req->post('titulo');
        $post->descripcion=$req->post('descripcion');
        $imagen=$req->file('imagen');

        $post->imagen=$imagen->getClientOriginalName();
        $mime=$imagen->getClientMimeType();
        if($mime==='image/png' || $mime==='image/jpg') {
            $imagen->storeAs('img', $post->imagen); // public/img/xxxx.xxx
            $post->save();
        }

        return view('insertar',['post'=>$post]);
    }
}
