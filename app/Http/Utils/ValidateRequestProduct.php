<?php
declare(strict_types=1);

namespace App\Http\Utils;

use Illuminate\Http\Request;

trait ValidateRequestProduct
{
    public function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'amount' => 'required|int|min:1',
            'category' => 'required|string|max:50',
            'date' => 'required|date_format:d/m/y',
            'price' => 'required|numeric|min:0',
        ]);
    }
}