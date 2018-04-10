<?php

namespace Emtudo\Units\Users\Http\Controllers;

use Emtudo\Support\Http\Controller;
use Emtudo\Units\Users\Http\Requests\CreateUserRequest;
use Emtudo\Units\Users\Http\Requests\UpdateUserRequest;
use Emtudo\Domains\Users\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Emtudo\Units\Users\Http\Requests\CreateUserRequest  $request
     * @param  \Emtudo\Domains\Users\Repositories\UserRepository    $repository
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request, UserRepository $repository)
    {
        $data = $request->all();

        $user = $repository->create($data);

        if ($user)
            return $this->respond->ok($user);
        
        return $this->respond->error('Ocorreu um erro interno');
    }

    /**
     * Display the specified resource.
     *
     * @param  int                                                  $id
     * @param  \Emtudo\Domains\Users\Repositories\UserRepository    $repository
     * @return \Illuminate\Http\Response
     */
    public function show(int $id, UserRepository $repository)
    {
        $user = $repository->find($id);

        if (!$user)
            return $this->respond->notFound('Usuário não encontrado');
        
        return $this->respond->ok($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int                          $id
     * @param  \Emtudo\Units\Users\Http\Requests\UpdateUserRequest  $request
     * @param  \Emtudo\Domains\Users\Repositories\UserRepository    $repository
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, UpdateUserRequest $request, UserRepository $repository)
    {
        $user = $repository->find($id);
        
        if (!$user)
            return $this->respond->notFound('Usuário não encontrado');
        
        $data = $request->all();

        $repository->update($user, $data);

        return $this->respond->ok($user);
    }
}