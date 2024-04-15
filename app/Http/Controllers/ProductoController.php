<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    // Muestra una lista de todos los productos
    public function index()
    {
        $productos = Producto::paginate(4);
        return view('productos.index', compact('productos'));
    }


    // Muestra el formulario para crear un nuevo producto
    public function create()
    {

        $productos = Producto::all();

        return view('productos.create', compact('productos'));

    }

    // Almacena un nuevo producto en la base de datos
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required',
                'description' => 'nullable|string',
                'image' => 'required|string',
            ]);

            Producto::create($request->all());

            return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
        } catch (\Exception $e) {
            // Registra el error en los logs
            Log::error('Error al crear un producto: ' . $e->getMessage());

            // Puedes redirigir a una página de error o manejar el error de alguna otra manera
            return redirect()->route('products.index')->with('error', 'Ha ocurrido un error al crear el producto.');
        }
    }

    // Muestra el producto con el ID especificado
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    // Muestra el formulario para editar un producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    // Actualiza el producto con el ID especificado en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'description' => 'nullable|string',
            'image' => 'sometimes|string',
        ]);

        $producto = Producto::findOrFail($id);

        // Actualiza solo los campos proporcionados en el formulario
        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->description = $request->description;
        $producto->image = $request->image;
        $producto->save();

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }
    // Elimina el producto con el ID especificado de la base de datos
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
