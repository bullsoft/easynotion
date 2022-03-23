<?php
namespace EasyNotion\Http;

use Exception;
use Psr\Http\Message\ResponseInterface;
use EasyNotion\Http\Exception\Non200;
use EasyNotion\Http\Factory;
use GuzzleHttp\Client as HttpClient;
use EasyNotion\Http\Request\Pagination;

class Client
{
    private string $body;
    private string $httpMethod;
    private array $headers;

    public function __construct(
        public readonly HttpClient $client,
        public array $requestOpts = [],
    )
    {
    }

    public function httpClient(): HttpClient
    {
        return $this->client;
    }

    public function httpMethod(): string
    {
        return $this->httpMethod;
    }

    public function requestOpts(): array
    {
        return $this->requestOpts;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function __call(string $method, array $args): mixed
    {
        if(!empty($args)) {
            $this->requestOpts = $args;
        }
        $this->httpMethod = $method;
        $response = call_user_func_array([$this->client, $method], $this->requestOpts);

        $code = $response->getStatusCode(); // 200
        if($code != 200) {
            $reason = $response->getReasonPhrase(); // OK
            throw new Non200("{$reason} {$code}");
        }
        $stream = $response->getBody(); // Body Stream
        $this->body = $stream->getContents(); // Content
        $this->headers = $response->getHeaders();

        return $this;
    }

    public function result()
    {
        $flag = false;
        if(!isset($this->headers['Content-Type'])) {
            if($flag === false) {
                throw new \ValueError("MIME: empty Content-Type");
            }
        }
        foreach($this->headers['Content-Type'] as $header) {
            if(str_contains($header, 'application/json')) {
                $flag = true; 
            }
        }
        if($flag === false) {
            throw new \ValueError("MIME: only accept application/json");
        }
        $data = json_decode($this->body, true);
        return Factory::make($data, $this);
    }
}