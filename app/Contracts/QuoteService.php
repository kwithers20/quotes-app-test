<?php

namespace App\Contracts;

interface QuoteService
{
    /**
     * Get quotes
     * 
     * @return array
     */
    public function getQuote(): array;
}
