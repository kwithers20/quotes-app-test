<?php

namespace Tests\Feature;

use Tests\TestCase;

class QuoteTest extends TestCase
{
    /**
     * Test the /api/quotes endpoint.
     *
     * @return void
     */
    public function testGetQuotes()
    {
        $headers = [
            'Authorization' => config('auth.api.token'),
            'Accept' => 'application/json',
        ];

        $response = $this->withHeaders($headers)->get('/api/quotes');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Quotes retrieved successfully',
                'data' => []
            ]);
    }

    /**
     * Test the /api/quotes endpoint with the fresh parameter.
     * 
     * @return void
     */
    public function testGetQuotesFresh()
    {
        $headers = [
            'Authorization' => config('auth.api.token'),
            'Accept' => 'application/json',
        ];

        $responseCache = $this->withHeaders($headers)->get('/api/quotes');

        $responseNew = $this->withHeaders($headers)->get('/api/quotes?fresh=true');

        $this->assertNotSame($responseCache->json()['data'], $responseNew->json()['data']);
    }
}
