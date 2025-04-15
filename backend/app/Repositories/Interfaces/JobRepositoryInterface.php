<?php
namespace App\Repositories\Interfaces;

interface JobRepositoryInterface
{
    public function all();
    public function find($id);
    public function incrementViews($id);}
