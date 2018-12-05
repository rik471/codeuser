<?php

namespace CodePress\CodeUser\Controllers\Admin;

use CodePress\CodeUser\Repository\UserRepositoryInterface;
use CodePress\CodeUser\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $repository;
    private $response;

    public function __construct(ResponseFactory $response, UserRepositoryInterface $repository)
    {
        $this->response = $response;
        $this->repository = $repository;
    }
    public function index()
    {
        $posts = $this->repository->all();
        return $this->response->view('codeuser::admin.user.index', compact('users'));
    }
    public function create()
    {
        $posts = $this->repository->all();
        return view('codeuser::admin.user.create', compact('users'));
    }
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.users.index');
    }
    public function edit($id)
    {
        $post = $this->repository->find($id);
        $posts = $this->repository->all();
        return $this->response->view('codeuser::admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.users.index');
    }

}