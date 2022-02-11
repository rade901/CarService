<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\category;
use App\Http\Resources\clientResource;



class CategoryChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $clients  = client::count();
        $category = client::where('category_id','=','3')->count();
        $private = client::where('category_id','=','4')->count();
        return Chartisan::build()
            ->labels(['Clients', 'Business', 'Private'])
            ->dataset('Clients category chart', [$clients, $category, $private]);
            
    }
}