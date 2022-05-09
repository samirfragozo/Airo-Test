<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Quotation\GetAgeLoad;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Quotation\StoreRequest;
use App\Http\Resources\Api\V1\Quotation\BaseResource;
use App\Models\Quotation;
use Carbon\Carbon;

class QuotationController extends Controller
{
    public function store(StoreRequest $request)
    {
        $total      = 0;
        $fixedRate  = Quotation::FIXED_RATE;
        $startDate  = Carbon::create($request->input('start_date'));
        $endDate    = Carbon::create($request->input('end_date'));
        $tripLength = $startDate->diffInDays($endDate) + 1;
        $ages       = collect(explode(',', trim($request->input('age'))))->filter(function($item) {
            return strlen((string) $item) > 0;
        })->map(function(string $item) {
            return (int) trim($item);
        });

        foreach ($ages as $age) {
            $ageLoad = (new GetAgeLoad($age))->execute();

            $total += $fixedRate * $ageLoad * $tripLength;
        }

        $quotation = Quotation::create([
            ...$request->all(),
            'total' => round($total),
        ]);

        return new BaseResource($quotation);
    }
}
