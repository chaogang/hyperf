<?php

declare(strict_types=1);

namespace App\Amqp\Consumer;

use Hyperf\DbConnection\Db;
use Hyperf\Amqp\Message\Type;
use Hyperf\Amqp\Result;
use Hyperf\Amqp\Annotation\Consumer;
use Hyperf\Amqp\Message\ConsumerMessage;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * @Consumer(exchange="hyperf", routingKey="hyperf", queue="hyperff", name ="DemoConsumer2", nums=1)
 */
class DemoConsumer2 extends ConsumerMessage
{
    protected $type = Type::FANOUT;

    public function consumeMessage($data, AMQPMessage $message): string
    {
        return Result::ACK;
    }
}
