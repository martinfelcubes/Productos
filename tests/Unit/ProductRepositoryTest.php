<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase; // Resetea la base de datos entre pruebas

    protected $productRepository;

    protected function setUp(): void
    {
        parent::setUp();
        // Inicializa el repositorio aquí
        $this->productRepository = new ProductRepository();
    }

    /** @test */
    public function it_can_get_all_products()
    {
        // Crear algunos productos de prueba
        $product1 = Product::factory()->create(['name' => 'Producto 1', 'description' => 'Descripción Producto 1', 'price' => 12, 'stock' => 1]);
        $product2 = Product::factory()->create(['name' => 'Producto 2', 'description' => 'Descripción Producto 2', 'price' => 12, 'stock' => 1]);

        // Llamar al método `all()` del repositorio

        
        $productos = $this->productRepository->all();

        // Asegurarse de que los productos están en la respuesta
        $this->assertCount(2, $productos);
        $this->assertTrue($productos->contains('name', 'Producto 1'));
        $this->assertTrue($productos->contains('name', 'Producto 2'));
    }


    public function it_can_find_product_by_id()
    {
        // Crear un producto
        $product = Product::factory()->create(['name' => 'Producto 1']);

        // Llamar al método `findBy()` del repositorio
        $foundProduct = $this->productRepository->findby($product->id);

        // Asegurarse de que el producto fue encontrado correctamente
        $this->assertNotNull($foundProduct);
        $this->assertEquals('Producto 1', $foundProduct->name);
    }

    
    public function it_returns_null_if_product_not_found()
    {
        // Intentar buscar un producto que no existe
        $nonExistentProduct = $this->productRepository->findby(999);

        // Asegurarse de que la respuesta es null
        $this->assertNull($nonExistentProduct);
    } 
}