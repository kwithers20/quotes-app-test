<?php

namespace App\Managers;

use App\Contracts\QuoteService;
use Illuminate\Support\Manager;
use App\Services\KanyeRestService;

class QuoteManager extends Manager
{
    protected function createKanyeDriver()
    {
        return new KanyeRestService();
    }

    public function getDefaultDriver()
    {
        return 'kanye'; 
    }
}
