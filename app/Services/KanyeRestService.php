<?php

namespace App\Services;

use App\Contracts\QuoteService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class KanyeRestService implements QuoteService
{
    /**
     * Get 5 quotes from the Kanye Rest API
     * 
     * @return array
     */
    public function getQuote(): array
    {
        return Cache::remember('quotes', 3600, function () {
            $quotes = [];
            $attempts = 0;
            $maxAttempts = 10; // Increase attempts to ensure getting 5 unique quotes

            while (count($quotes) < 5 && $attempts < $maxAttempts) {
                try {
                    $response = Http::withoutVerifying()->get('https://api.kanye.rest/');
                    $quote = $response->json()['quote'] ?? null;

                    if (!is_null($quote) && !in_array($quote, $quotes)) {
                        $quotes[] = $quote;
                    }

                } catch (Exception $e) {
                    // Handle the exception or log it
                    break; // Break the loop if there's an error
                }

                $attempts++;
                usleep(500000); // Delay to prevent rate limit issues
            }

            if (count($quotes) < 5) {
                $quotes[] = 'Not enough quotes available at the moment.';
            }

            return $quotes;
        });        
    }
}
