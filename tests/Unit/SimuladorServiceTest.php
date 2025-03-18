<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\SimuladorService;
use App\Models\Parametro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use stdClass;

class SimuladorServiceTest extends TestCase
{
    public function testConverteMoedaFloat()
    {
        $service = new SimuladorService();

    // Reflexão para acessar método privado
    $reflection = new \ReflectionClass(SimuladorService::class);
    $method = $reflection->getMethod('converteMoedaFloat');
    $method->setAccessible(true);

    // Teste com valores corretos
    $this->assertEquals(100.50, $method->invoke($service, "100,50"));
    $this->assertEquals(2000.99, $method->invoke($service, "2.000,99"));
    // $this->assertEquals(1500.75, $method->invoke($service, "1,500.75"));

    // Teste com valores inválidos
    $this->assertEquals(0.0, $method->invoke($service, null));
    $this->assertEquals(0.0, $method->invoke($service, ""));
    $this->assertEquals(0.0, $method->invoke($service, "abc"));
    }


    public function testSimulaJogadaComParametrosValidos()
    {
        // Criando um registro no banco para simular a busca de parâmetros
        Parametro::factory()->create([
            'id' => 1,
            // Adicione aqui os campos que o modelo Parametro precisa
        ]);

        // Instanciar o serviço
        $service = new SimuladorService();

        // Dados de entrada
        $data = [
            'dell_valor' => '3.500,00',
            'hp_valor' => '3.500,00',
            'dell_folha' => '0',
            'hp_folha' => '0',
            'dell_publicidade' => '0',
            'hp_publicidade' => '0',
        ];
        $jogadas = [['rodada' => 1], ['rodada' => 2]]; // Simulação de jogadas

        // Executar a função
        $resultado = $service->simulaJogada($data, $jogadas);

        // Verificações
        $this->assertInstanceOf(stdClass::class, $resultado);
        $this->assertObjectHasAttribute('dell_valor', $resultado);
        $this->assertObjectHasAttribute('hp_valor', $resultado);

        // Verifica se os valores foram corretamente convertidos para float
        $this->assertEquals(100.50, $resultado->dell_valor);
        $this->assertEquals(200.75, $resultado->hp_valor);
        $this->assertEquals(50.00, $resultado->dell_folha);
        $this->assertEquals(75.00, $resultado->hp_folha);
        $this->assertEquals(20.00, $resultado->dell_publicidade);
        $this->assertEquals(25.00, $resultado->hp_publicidade);
    }
}
