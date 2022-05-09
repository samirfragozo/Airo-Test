<?php

namespace App\Http\Resources\Api\V1\Quotation;

use App\Constants\RequestKeys;
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
            RequestKeys::TOTAL        => $quotation->total,
            RequestKeys::CURRENCY_ID  => $quotation->currency_id,
            RequestKeys::QUOTATION_ID => $quotation->id,
        ];
    }
}
