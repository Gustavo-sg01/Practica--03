<?php

use App\Libro;
use Carbon\Carbon; // sistema de fechas de laravel
use App\Categoria;
use App\User;
use App\Etiqueta;
use Illuminate\Database\Seeder;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create();// Me genero 5 nuevos usuarios predeterminados
         
/*
        Categoria::truncate(); // Evitara que se dupliquen datos
    
        
        $categoria = new Categoria();
        $categoria->nombre = "Categoría 1";
        $categoria->save();


        Etiqueta::truncate(); // Evita duplicar datos
    */

          factory(Categoria::class, 10)->create();

        $etiqueta = new Etiqueta();
        $etiqueta->nombre = "Etiqueta 1";
        $etiqueta->save();

        $etiqueta = new Etiqueta();
        $etiqueta->nombre = "Etiqueta 2";
        $etiqueta->save();

        Libro::truncate(); // Evita duplicar datos

        $libro = new Libro();
        $libro->titulo = "Mi primer libro";
        $libro->descripcion = "Extracto de mi primer libro";
        $libro->contenido = "<p>Resumen de mi primer libro</p>";
        $libro->fecha = Carbon::now(); // Genera una fecha fictisia, la actual
        $libro->categoria_id = 1;
        $libro->save();
        
        $libro->etiquetas()->attach([1, 2]); //Relacionar el libro a dos etiquetas
        
        $libro = new Libro();
        $libro->titulo = "Mi segundo libro";
        $libro->descripcion = "Extracto de mi segundo libro";
        $libro->contenido = "<p>Resumen de mi segundo libro</p>";
        $libro->fecha = Carbon::now();
        $libro->categoria_id = 1;
        $libro->save();

        $libro->etiquetas()->attach([1]); //Relacionar el libro a una etiqueta

        $libro = new Libro();
        $libro->titulo = "Mi tercer libro";
        $libro->descripcion = "Extracto de mi tercer libro";
        $libro->contenido = "<p>Resumen de mi tercer libro</p>";
        $libro->fecha = Carbon::now();
        $libro->categoria_id = 1;
        $libro->save();

        $libro->etiquetas()->attach([2]); //Relacionar el libro a una etiqueta
        
    
    
    }
}
