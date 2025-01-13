<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;



class ProductRepositoryTest extends TestCase
{
   use RefreshDatabase;

     // Resetea la base de datos entre pruebas

    protected $productRepository;

    protected function setUp(): void
    {
        parent::setUp();
        // Inicializa el repositorio aquí
        $this->productRepository = new ProductRepository(new Product());
    }

public function test_puedeaplciareloproductseeder(){
    $this->seed(ProductSeeder::class);
    $this->assertDatabaseCount('products', 4);

    $this->assertDatabaseHas('products', [
        'name' => 'Madera',
        'description' => 'Producto utilizado para construiciion de muebles',
        'price' => 50.5,
        'stock' => 100,
    ]);

}

public function test_crear_validar_product_create(){

    //Creación de un Producto de prueba con el metodo Save
    $producto = new Product();
    $producto->name = 'Test';
    $producto->description = 'Test';
    $producto->price = 100;
    $producto->stock = 10;

    $this->productRepository->save($producto);

    $this->assertDatabaseHas('products', [
        'name' => 'Test',
        'description' =>'Test',
        'price' => 100,
        'stock' => 10,
    ]);


}




 /** @test */
  public function test_it_can_get_all_products()
{
//Cargamos datos a la base de datos apra validar el metodo all()

    $this->seed(ProductSeeder::class);

   // Llamar al método `all()` del repositorio
   
    $productos = $this->productRepository->all();

    //Verifico que se hallan cargado todos los elementos del ProductSeeder "4"

    $this->assertCount(4, $productos);

    // Asegurarse de que los productos están en la respuesta

    $this->assertTrue($productos->contains('name', 'Madera'));
    $this->assertTrue($productos->contains('name', 'Metal'));
    $this->assertTrue($productos->contains('name', 'Piedra'));
    $this->assertTrue($productos->contains('name', 'Hilo'));

    }

    public function test_it_can_find_product_by_id()
    {
    
    //Cargamos datos a la base de datos para validar el metodo findby()
    $this->seed(ProductSeeder::class);
    $this->assertDatabaseHas('products', [
        'name' => 'Madera',
        'description' => 'Producto utilizado para construiciion de muebles',
        'price' => 50.5,
        'stock' => 100,
    ]);
    // Llamar al método `findBy()` del repositorio

    $foundProduct = $this->productRepository->findby(1);
    
    //Prueba saldia por consola
    echo "hola".$foundProduct->name;
    
    // Asegurarse de que el producto fue encontrado correctamente
   $this->assertNotNull($foundProduct);
   $this->assertEquals('Madera', $foundProduct->name);
    }
    
    public function test_it_returns_null_if_product_not_found()
    {
    // Intentar buscar un producto que no existe
    $nonExistentProduct = $this->productRepository->findby(999);

    // Asegurarse de que la respuesta es null
    $this->assertNull($nonExistentProduct);
    } 
}