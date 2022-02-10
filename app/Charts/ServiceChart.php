<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\service;
use App\Models\car;

class ServiceChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $clients = client::count();
        $services = service::count();
        $cars = car::count();
        return Chartisan::build()
            ->labels(['Clients', 'Service', 'Total Cars'])
            ->dataset('Sample', [$clients, $services, $cars])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}