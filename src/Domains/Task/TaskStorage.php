<?php
declare(strict_types=1);

namespace Tymeshift\PhpTest\Domains\Task;

use Tymeshift\PhpTest\Components\HttpClientInterface;

class TaskStorage
{
    private $client;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->client = $httpClient;
    }

    public function getByScheduleId(int $id): array
    {
        $result = [];

        $response = $this->client->request('GET', 'http://localhost:18080?scheduleId='.$id);
        if($response){
            $result = $response;
        }

        return $result;
    }

    public function getByIds(array $ids): array
    {
        // TODO: Implement getByIds() method.
    }
}
