<?php

namespace CodePress\CodeUser\Controllers\Admin;

use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use CodePress\CodeUser\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;

class PermissionsController extends Controller
{
    private $repository;
    private $response;

    public function __construct(ResponseFactory $response, PermissionRepositoryInterface $repository)
    {
        $this->response = $response;
        $this->repository = $repository;
    }
    public function index()
    {
        $permissions  = $this->repository->all();
        return $this->response->view('codeuser::admin.permission.index', compact('permissions'));
    }
    public function show($id)
    {
        $permission = $this->repository->find($id);
        return $this->response->view('codeuser::admin.permission.show', compact('permission'));
    }
}