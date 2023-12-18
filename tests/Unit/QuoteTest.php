<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\KanyeRestService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Exception;

class QuoteTest extends TestCase
{
    public function testGetQuoteReturnsArray()
    {
        $service = new KanyeRestService();

        $result = $service->getQuote();

        $this->assertIsArray($result);
    }

    public function testGetQuoteReturnsUniqueQuotes()
    {
        $service = new KanyeRestService();

        $result = $service->getQuote();

        $this->assertCount(5, $result);
        $this->assertSameSize(array_unique($result), $result);
    }

    public function testGetQuoteCachesQuotes()
    {
        $service = new KanyeRestService();

        $result1 = $service->getQuote();
        $result2 = $service->getQuote();

        $this->assertSame($result1, $result2);
    }
}
