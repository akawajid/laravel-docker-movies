<?php

use App\Models\Movie;
use Illuminate\Support\Collection;

interface MovieRepositoryInterface{

    public function all(): Collection;
    public function find(Int $id): ?Movie;
    public function store(array $data): Movie;
    public function update(Int $id, array $data): bool;
    public function delete(Int $id): bool;
    
}