<?php

use App\Models\Movie;
use Illuminate\Support\Collection;

class MovieRepository implements MovieRepositoryInterface{
    
    public function all(): Collection
    {
        return Movie::all();
    }

    public function store(array $data): Movie
    {
        return Movie::creat($data);
    }

    public function find(int $id): ?Movie
    {
        Movie::find($id);
    }

    public function update(int $id, array $data): bool
    {
        return  Movie::find($id)->update($data);
    }

    
    public function delete(int $id): bool
    {
        $movie = Movie::find($id);
        return $movie ? (bool) $movie::delete($id): false;
    }
}