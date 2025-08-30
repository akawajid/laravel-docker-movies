<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use BaseController;
use Exception;
use Illuminate\Http\Request;
use MovieRepositoryInterface;
use Ramsey\Uuid\Type\Integer;

class MovieController extends BaseController
{
    protected $movie;
    public function __construct(MovieRepositoryInterface $movie) {
        $this->movie = $movie;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->handleSuccessResponse($this->movie->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate();
            return $this->handleSuccessResponse([
                'movie' => $this->movie->store($request->all()),
            ]);
        } catch(Exception $e){
            return $this->handleErrorResponse(['eror' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Int $id)
    {
        return $this->handleSuccessResponse([
            'movie' => $this->movie->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Int $id)
    {
         return $this->handleSuccessResponse([
            'movie' => $this->movie->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Int $id)
    {
        try{
            $request->validate();
            return $this->handleSuccessResponse([
                'movie' => $this->movie->update($id, $request->all()),
            ]);
        } catch(Exception $e){
            return $this->handleErrorResponse(['eror' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id)
    {
        return $this->handleSuccessResponse([
            $this->movie->delete($id)
        ]);
    }
}
