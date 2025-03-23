<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

use App\Http\Resources\RetailerResource;

use App\Models\Retailer;

interface RetailerServiceContract
{
    public function getAllRetailers(): AnonymousResourceCollection;
    public function getOneRetailer(Retailer $retailer): RetailerResource;
    public function createRetailer(array $data): void;
    public function updateRetailer(array $data, Retailer $retailer): void;
    public function deleteRetailer(Retailer $retailer): void;
}
