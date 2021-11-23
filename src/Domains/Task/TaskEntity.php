<?php
declare(strict_types=1);

namespace Tymeshift\PhpTest\Domains\Task;

use Tymeshift\PhpTest\Interfaces\EntityInterface;

class TaskEntity implements EntityInterface
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var int
     */
    protected int $schedule_id;

    /**
     * @var int
     */
    protected int $startTime;

    /**
     * @var int
     */
    protected int $duration;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TaskEntity
     */
    public function setId(int $id): TaskEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getScheduleId(): int
    {
        return $this->schedule_id;
    }

    /**
     * @param int $schedule_id
     * @return TaskEntity
     */
    public function setScheduleId(int $schedule_id): TaskEntity
    {
        $this->schedule_id = $schedule_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartTime(): int
    {
        return $this->startTime;
    }

    /**
     * @param int $startTime
     * @return TaskEntity
     */
    public function setStartTime(int $startTime): TaskEntity
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return TaskEntity
     */
    public function setDuration(int $duration): TaskEntity
    {
        $this->duration = $duration;
        return $this;
    }
}
