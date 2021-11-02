<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Clientes;

class ClientesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_clientes()
    {
        $clientes = Clientes::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/clientes', $clientes
        );

        $this->assertApiResponse($clientes);
    }

    /**
     * @test
     */
    public function test_read_clientes()
    {
        $clientes = Clientes::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/clientes/'.$clientes->id
        );

        $this->assertApiResponse($clientes->toArray());
    }

    /**
     * @test
     */
    public function test_update_clientes()
    {
        $clientes = Clientes::factory()->create();
        $editedClientes = Clientes::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/clientes/'.$clientes->id,
            $editedClientes
        );

        $this->assertApiResponse($editedClientes);
    }

    /**
     * @test
     */
    public function test_delete_clientes()
    {
        $clientes = Clientes::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/clientes/'.$clientes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/clientes/'.$clientes->id
        );

        $this->response->assertStatus(404);
    }
}
