<?php

namespace App\Http\Controllers\Publication;

use App\Http\Classes\LogicalModels\Publication\Publication;
use App\Http\Controllers\BaseControllers\WebController;
use App\Http\Requests\Publication\{
    PublicationSendRequest,
    DeletePublicationRequest,
};

class PublicationController extends WebController
{
    public function __construct(
        private Publication $model
    ){}

    public function send(PublicationSendRequest $request)
    {
        $this->model->send($request->getData());
        return $this->makeGoodResponse([]);
    }
    public function delete(DeletePublicationRequest $request)
    {
        $this->model->delete($request->getData());
        return $this->makeGoodResponse([]);
    }

    public function getAll()
    {
        $result = $this->model->getAll();
        return $this->makeGoodResponse($result);
    }
    public function getMy()
    {
        $result = $this->model->getMy();
        return $this->makeGoodResponse($result);
    }
}
