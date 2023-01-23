<?php

namespace App\Http\Controllers;

use Blok\Mock\Http\Controllers\MockController;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ChildMockController
{
    /**
     * @param int $parentId
     * @param string $table
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse|\Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(int $parentId, string $table, Request $request): mixed
    {
        return app(MockController::class)->index($table, $request);
    }

    /**
     * @param int $parentId
     * @param string $table
     * @param int $id
     * @param Request $request
     * @return Collection|mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function view(int $parentId, string $table, int $id, Request $request)
    {
        return app(MockController::class)->view($table, $id, $request);
    }
}
