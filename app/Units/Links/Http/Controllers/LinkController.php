<?php

namespace Emtudo\Units\Links\Http\Controllers;

use Emtudo\Support\Http\Controller;
use Emtudo\Units\Links\Http\Requests\CreateLinkRequest;
use Emtudo\Domains\Links\Repositories\LinkRepository;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LinkRepository $repository)
    {
        $links = $repository->userOnly(true)->getAll();

        return $this->respond->ok($links);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Emtudo\Units\Links\Http\Requests\CreateLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLinkRequest $request, LinkRepository $repository)
    {        
        $data = $request->all();

        $link = $repository->create($data);

        if ($link)
            return $this->respond->ok($link);
        
        return $this->respond->error('Ocorreu algum erro interno');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Emtudo\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show($id, LinkRepository $repository)
    {
        $link = $repository->findId($id);

        $repository->doClick($link);

        if (!$link)
            return $this->respond->notFound('Link não foi encontrado');
        
        return $this->respond->ok($link);
    }
}