<?php

namespace App\Repositories;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $support
    ) {}

    public function getAll(string $filter = null): array
    {
        return $this->support
                    ->where(function ($query) use ($filter) {
                        if ($filter) {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%$filter%");
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function findOneById(string $id): stdClass|null
    {
        $support = $this->support->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

    public function create(CreateSupportDTO $dto): stdClass
    {
        $support = $this->support->create((array) $dto);

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        $support = $this->support->find($dto->id);

        if (!$support) {
            return null;
        }

        $support->update((array) $dto);

        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->support->findOrFail($id)->delete();
    }

}
