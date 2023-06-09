<?php

namespace App\Http\Classes\LogicalModels\Publication;

use App\Http\DTO\Publication\PublicationDto;

class Publication
{
    public function __construct(
        private PublicationModel $model
    ){}

    public function send(PublicationDto $data): void
    {
        $this->model->send($data);
    }

    public function delete(PublicationDto $data): void
    {
        $this->model->delete($data);
    }

    public function edit(PublicationDto $data): void
    {
        $this->model->edit($data);
    }

    public function getAll(): array
    {
        return $this->model->getAll();
    }

    public function getMy(): array
    {
        return $this->model->getMy();
    }
}
