<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Amqp\Consumer\DemoConsumer as ConsumerDemoConsumer;
use Hyperf\DbConnection\Db;
use Hyperf\Utils\Coroutine;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Task\TaskExecutor;
use Hyperf\Task\Task;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Amqp\Producer;
use App\Amqp\Producer\DemoProducer;

class IndexController extends AbstractController
{
    /**
     * @Inject 
     * @var Producer
     */
    private $producer;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function handle($cid)
    {
        return [
            'worker.cid' => $cid,
            // task_enable_coroutine 为 false 时返回 -1，反之 返回对应的协程 ID
            'task.cid' => Coroutine::id(),
        ];
    }
}
