<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discord extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function enviarEmbed($url, $contenido, $embeds) {
        $json = json_encode([
            "content" => $contenido,
            "username" => "IVAO Venezuela
            ",
            "embeds" => $embeds
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $json,
            
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec( $ch );
        curl_close( $ch );   
    }
}