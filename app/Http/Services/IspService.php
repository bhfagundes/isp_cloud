<?php


namespace App\Http\Services;

class IspService
{
    private $baseUrl;

    public function __construct(string $token)
    {
        $this->baseUrl = 'ws.integracoes.ispcloud.com.br?token='.$token;
    }

    public function baseRequest(array $bodyParams)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$bodyParams,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function autenticacao(string $cnpjCpf)
    {
        $bodyParams = [
            "funcao"=> "autenticar",
            "cnpjCpf"=>$cnpjCpf
        ];
        return $this->baseRequest($bodyParams);
    }

    public function verificarBloqueio(int $idContrato)
    {
        $bodyParams = [
            "funcao"=> "bloqueio",
            "id_contrato"=>$idContrato
        ];
        return $this->baseRequest($bodyParams);
    }

    public function desbloqueio(int $idContrato)
    {
        $bodyParams = [
            "funcao"=> "desbloqueio",
            "id_contrato"=>$idContrato
        ];
        return $this->baseRequest($bodyParams);
    }

    public function boletos(int $idContrato)
    {
        $bodyParams = [
            "funcao"=> "boletos",
            "id_contrato"=>$idContrato
        ];
        return $this->baseRequest($bodyParams);
    }

    public function ticket(int $idContrato)
    {
        $bodyParams = [
            "funcao"=> "ticket",
            "id_contrato"=>$idContrato
        ];
        return $this->baseRequest($bodyParams);
    }

    public function suporte(int $idContrato, int $subcategoria, string $problema)
    {
        $bodyParams = [
            "funcao"=> "suporte",
            "id_contrato"=>$idContrato,
            "subcategoria"=>$subcategoria,
            "problema"=>$problema
        ];
        return $this->baseRequest($bodyParams);
    }

    public function pppoe()
    {
        $bodyParams = [
            "funcao"=> "pppoe"
        ];
        return $this->baseRequest($bodyParams);
    }

    public function consultaDadosCliente(string $cpfCnpj)
    {
        $bodyParams = [
            "funcao"=> "consultacpf",
            "cpf_cnpj"=>$cpfCnpj
        ];
        return $this->baseRequest($bodyParams);
    }
}
