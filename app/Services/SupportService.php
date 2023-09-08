<?php

namespace App\Services;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{
    public function __construct(
        protected SupportRepositoryInterface $repository
    ) {}

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOneById(string $id): stdClass|null
    {
        return $this->repository->findOneById($id);
    }

    public function create(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
