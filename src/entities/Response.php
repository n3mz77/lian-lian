<?php
namespace Persec\LianLian\Entities;

class Response
{
    public $code;
    public $message;
    public $data;
    public $trace_id;

    public function __construct(array $properties)
    {
        foreach ($properties as $k => $v) {
            if (property_exists($this, $k)) {
                $this->{$k} = $v;
            }
        }
    }
}
