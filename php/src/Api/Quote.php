<?php

namespace App\Api;

use App\Core\Database;
use App\Core\Response;

class Quote
{
    public function random()
    {
        $q = "SELECT quote
            FROM quotes
            ORDER BY RAND()
            LIMIT 1;
            ";

        $quote = Database::q($q)->fetch();

        Response::json($quote);
    }
}
