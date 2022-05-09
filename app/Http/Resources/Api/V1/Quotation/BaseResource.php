<?php

namespace App\Http\Resources\Api\V1\Quotation;

use App\Models\Quotation;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function __construct(Quotation $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request): array
    {
        $quotation = $this->resource;

        return [
            'total'        => $quotation->total,
            'currency_id'  => $quotation->currency_id,
            'quotation_id' => $quotation->id,
        ];
    }
}
