<?php
declare(strict_types=1);

namespace Tymeshift\PhpTest\Domains\Task;

use Tymeshift\PhpTest\Exceptions\StorageDataMissingException;
use Tymeshift\PhpTest\Interfaces\EntityCollection;
use Tymeshift\PhpTest\Interfaces\EntityInterface;
use Tymeshift\PhpTest\Interfaces\RepositoryInterface;

class TaskRepository implements RepositoryInterface
{
    /**
     * @var TaskFactory
     */
    private $factory;

    /**
     * @var TaskStorage
     */
    private $storage;

    public function __construct(TaskStorage $storage, TaskFactory $factory)
    {
        $this->factory = $factory;
        $this->storage = $storage;
    }

    public function getById(int $id): EntityInterface
    {
        // TODO: Implement getById() method.
    }

    public function getByScheduleId(int $scheduleId):TaskCollection
    {
        $data = $this->storage->getByScheduleId($scheduleId);

        if(empty($data) || !is_array($data)){
            throw new Exception();
        }

        return $this->factory->createCollection($data);
    }

    public function getByIds(array $ids): TaskCollection
    {
        // TODO: Implement getByIds() method.
    }
}
