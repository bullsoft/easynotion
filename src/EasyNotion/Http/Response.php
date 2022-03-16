<?php
namespace EasyNotion\Http;

use Exception;
use Psr\Http\Message\ResponseInterface;
use EasyNotion\Http\Exception\Non200;
use EasyNotion\Http\Factory;

class Response
{
    private string $body;
    private array $headers;

    public function __construct(
        public readonly ResponseInterface $response
    )
    {
        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK
        if($code != 200) {
            throw new Non200("{$reason} {$code}");
        }
        $stream = $response->getBody(); // Body
        $this->body = $stream->getContents();
        $this->headers = $response->getHeaders();
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getValue()
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
        return Factory::make($data);
    }
}