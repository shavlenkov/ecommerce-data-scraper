<?php

namespace App\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

use App\Contracts\RetailerServiceContract;

use App\Http\Resources\RetailerResource;

use App\Models\Retailer;

class RetailerService implements RetailerServiceContract
{
    /**
     * Method for getting all retailers with pagination
     *
     * @return AnonymousResourceCollection
     */
    public function getAllRetailers(): AnonymousResourceCollection
    {
        return RetailerResource::collection(
            Retailer::simplePaginate(config('app.pagination_limit'))
        );
    }

    /**
     * Method for getting a specific retailer
     *
     * @param Retailer $retailer
     * @return RetailerResource
     */
    public function getOneRetailer(Retailer $retailer): RetailerResource
    {
        return new RetailerResource($retailer);
    }

    /**
     * Method for creating a new retailer
     *
     * @param array $data
     * @return void
     */
    public function createRetailer(array $data): void
    {
        Retailer::create($data);
    }

    /**
     * Method for updating the data of a specific retailer
     *
     * @param array $data
     * @param Retailer $retailer
     * @return void
     */
    public function updateRetailer(array $data, Retailer $retailer): void
    {
        [
            'title' => $title,
            'url' => $url,
            'currency' => $currency,
            'logo' => $logo,
        ] = $data;

        $retailer->title = $title;
        $retailer->url = $url;
        $retailer->currency = $currency;
        $retailer->logo = $logo;

        $retailer->save();
    }

    /**
     * Method for deleting a specific retailer
     *
     * @param Retailer $retailer
     * @return void
     */
    public function deleteRetailer(Retailer $retailer): void
    {
        $retailer->delete();
    }
}
