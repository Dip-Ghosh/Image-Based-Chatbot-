<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ChatGptApiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client  = new Client();
        $this->apiKey  = config('chatgpt.api_key');
        $this->baseUrl = config('chatgpt.base_url');
    }

    public function generateResponseFromImage($imageUrl)
    {
        try {
            $response = $this->client->post($this->baseUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json'    => [
                    'prompt'      => 'Process the content of the uploaded image: ' . $imageUrl,
                    'temperature' => 0.7,
                    'max_tokens'  => 150,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            dd($data, $imageUrl);
            return $data['choices'][0]['text'];
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
        }
    }
}