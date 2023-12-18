<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->has('fresh') && $request->input('fresh') == 'true') {
            Cache::forget('quotes');
        }

        $data = app('quote')->driver()->getQuote();

        if (count($data) > 1) {
            return response()->json([
                'success' => true,
                'message' => 'Quotes retrieved successfully',
                'data' => $data
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $data[0],
        ], 500);
    }
}
