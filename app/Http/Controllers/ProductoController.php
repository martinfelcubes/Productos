<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductoController extends Controller
{

    private $productRepository;
    
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

 
    public function index()
    {
        $Productos = $this->productRepository->all();

       // $Productos = Product::where('id','LIKE','%'.$texto.'%')->get();
        
        return view("Productos.index", compact('Productos'));
    }

   
    public function create()
    {
        return view("Productos.create");
    }

   
    public function store(Request $request)
    {

        request()->validate([
            'name'=>'required|string|max:255',
            'price'=>'required',
            'stock'=>'required',
        ]);


        $producto = Product::create($request->all());
        $this->productRepository->save($producto);
       // dd($request->all());
       // $producto = Product::create($request->all());
        return to_route("indexproducto");
    }

 
    public function show(Request $request)
{
    // Verificar si el ID está presente en la solicitud
    if ($request->id != null) {
        
        // Buscar el producto usando el repositorio
        $producto = $this->productRepository->findby($request->id);

        // Si el producto fue encontrado, retornamos la vista
        if ($producto) {
            return view("Productos.show", compact("producto"));
        } else {
            // Si el producto no fue encontrado, redirigimos con un mensaje de error
            return redirect()->back()->with("error", "Producto no encontrado");
        }

    } else {
        // Si no se proporciona un ID, redirigir con un mensaje de error
        return redirect()->back()->with("error", "Id no proporcionado");
    }
}

  
    public function edit(string $id)
    {
        $producto = Product::find($id);

        return view("Productos.edit", compact("producto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'name'=>'required|string|max:255',
            'price'=>'required',
            'stock'=>'required',
        ]);

        $producto = Product::find($id);
        $producto->fill($request->all());
        $producto->save();
        return to_route("indexproducto");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $producto = Product::find($id);
        $producto = $this->productRepository->delete($producto);
            
        return to_route("indexproducto");
    }
}
