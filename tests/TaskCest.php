<?php
declare(strict_types=1);

namespace Tests;

use Codeception\Example;
use Codeception\Test\Unit;
use Mockery\Mock;
use Tymeshift\PhpTest\Components\HttpClientInterface;
use Tymeshift\PhpTest\Domains\Task\TaskCollection;
use Tymeshift\PhpTest\Domains\Task\TaskFactory;
use Tymeshift\PhpTest\Domains\Task\TaskRepository;
use Tymeshift\PhpTest\Domains\Task\TaskStorage;

class TaskCest
{

    /**
     * @var TaskRepository
     */
    private $taskRepository;


    public function _before()
    {
        $httpClientMock = \Mockery::mock(HttpClientInterface::class);
        $this->taskStorageMock = \Mockery::mock(new TaskStorage($httpClientMock));
        $this->taskRepository = new TaskRepository($this->taskStorageMock, new TaskFactory());
    }

    public function _after()
    {
        $this->taskRepository = null;
        \Mockery::close();
    }

    /**
     * @dataProvider tasksDataProvider
     */
    public function testGetTasks(Example $example, \UnitTester $tester)
    {
        [
            ["id" => $id, "schedule_id" => $schedule_id, "start_time" => $start_time, "duration" => $duration],
            ["id" => $id, "schedule_id" => $schedule_id, "start_time" => $start_time, "duration" => $duration],
            ["id" => $id, "schedule_id" => $schedule_id, "start_time" => $start_time, "duration" => $duration],
        ] = $example;

        $this->taskStorageMock
            ->shouldReceive('getByScheduleId')
            ->with(1)
            ->andReturn([
                            ["id" => $id, "schedule_id" => $schedule_id, "start_time" => $start_time, "duration" => $duration],
                            ["id" => $id, "schedule_id" => $schedule_id, "start_time" => $start_time, "duration" => $duration],
                            ["id" => $id, "schedule_id" => $schedule_id, "start_time" => $start_time, "duration" => $duration],
                        ]);

        $tasks = $this->taskRepository->getByScheduleId(1);
        $tester->assertInstanceOf(TaskCollection::class, $tasks);
    }

    public function testGetTasksFailed(\UnitTester $tester)
    {
        $tester->expectThrowable(\Exception::class, function (){
            $this->taskRepository->getByScheduleId(4);
        });
    }

    public function tasksDataProvider()
    {
        return [
            [
                ["id" => 123, "schedule_id" => 1, "start_time" => 0, "duration" => 3600],
                ["id" => 431, "schedule_id" => 1, "start_time" => 3600, "duration" => 650],
                ["id" => 332, "schedule_id" => 1, "start_time" => 5600, "duration" => 3600],
            ]
        ];
    }
}
