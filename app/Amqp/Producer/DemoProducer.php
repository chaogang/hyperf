<?php

declare(strict_types=1);

namespace App\Amqp\Producer;

use Hyperf\Amqp\Message\Type;
use Hyperf\Amqp\Annotation\Producer;
use Hyperf\Amqp\Message\ProducerMessage;

/**
 * @Producer(exchange="hyperf", routingKey="hyperf", name ="DemoProducer")
 */
class DemoProducer extends ProducerMessage
{
    protected $type = Type::FANOUT;
    
    public function __construct($data)
    {
        $this->payload = $data;
    }
}
