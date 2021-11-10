<?php


namespace App\Http\Services;


class TopsAppService
{
    private $baseUrl;
    private $usuario;
    private $senha;
    private $identificador;
    private $idUsuario;
    public function __construct(string $url,string $usuario, string $senha, string $identificador, int $idUsuario)
    {
        $this->baseUrl = $url;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->identificador = $identificador;
        $this->idUsuario = $idUsuario;

    }
    public function baseRequest(string $url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    public function login()
    {
        $url = $this->baseUrl.'/Login?usuario='.$this->usuario.'&senha='.$this->senha.'&identificador='.$this->identificador;

        $response = $this->baseRequest($url);
        $token = null;
        try {
            $response = json_decode($response);
            $token = $response->sessao;
        } catch (\Exception $e) {
            $token = null;
        }
        return $token;
    }
    public function clientes()
    {
        $token = $this->login();
        $clientes = null;
        if($token) {
            $url = "$this->baseUrl/ObterClientes?idUsuario=$this->idUsuario&sessao=$token&identificador=$this->identificador";
            $clientes = $this->baseRequest($url);
        }
        return $clientes;
    }
}
