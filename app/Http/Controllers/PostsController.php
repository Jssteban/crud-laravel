<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use function Pest\Laravel\post;

class PostsController extends Controller
{
    public function index(){
        // Obtener todos los posts de la base de datos
       $posts = Post::all();
    
        // Devolver la vista 'posts.index' y pasar los posts como datos a esa vista
        return view('posts.index', compact('posts'));
    }
    

    public function store(Request $request){// Validamos los datos de la solicitud
        $request->validate([
            'title' => 'required|max:255', // El título es obligatorio y debe tener como máximo 255 caracteres
            'body'  => 'required'           // El cuerpo del post es obligatorio
        ]); 
        
        // Creamos un nuevo post con los datos de la solicitud y lo almacenamos en la base de datos
        Post::create($request->all());

        // Redireccionamos al usuario a la página de índice de posts y mostramos un mensaje de éxito
        return redirect()->route('post.index')->with('success','Post created successfully.');
    }
    
    public function show($id){
        // Buscamos el post en la base de datos utilizando el ID proporcionado
        $posts = Post::find($id); // Buscamos el post por su ID
    
        // Retornamos la vista 'posts.show' y pasamos el post como dato a esa vista
        return view('posts.show', compact('post'));
    }
    
    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|max:255', // Validamos que el título sea requerido y tenga un máximo de 255 caracteres
            'body' => 'requires'             // ERROR: Debería ser 'required' en lugar de 'requires'
        ]);
       $posts = Post::find($id);           // Buscamos el post en la base de datos utilizando el ID proporcionado
       $posts->update($request->all());     // Actualizamos los atributos del post con los datos de la solicitud
        
        // Redireccionamos al usuario a la página de índice de posts y mostramos un mensaje de éxito
        return redirect()->route('post.index')->with('success','Post created successfully.');
    }        

    public function destroy($id){
        // Buscamos el post en la base de datos utilizando el ID proporcionado
       $posts = Post::find($id); // Buscamos el post por su ID
    
        // Eliminamos el post de la base de datos
       $posts->delete(); // Eliminamos el post
    
        // Redireccionamos al usuario a la página de índice de posts y mostramos un mensaje de éxito
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }

    public function create(){
        // Esta función se encarga de cargar la vista 'posts.create' para mostrar el formulario de creación de posts
        return view('posts.create');
    }
    public function edit($id) {
        // Buscamos el post en la base de datos utilizando el ID proporcionado
        $post = Post::find($id);
    
        // Retornamos la vista 'posts.edit' y pasamos el post como dato a esa vista
        return view('posts.edit', compact('post'));
    }
        
}
