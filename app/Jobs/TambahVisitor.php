<?php

namespace App\Jobs;

use App\Models\Counter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TambahVisitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $kampret;

    public function __construct($a)
    {
        $this->kampret = $a;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $geoipInfo = geoip()->getLocation($this->kampret);

        $data = [
            'ip' => $geoipInfo->ip,
            'iso_code' => $geoipInfo->iso_code,
            'country' => $geoipInfo->country,
            'city' => $geoipInfo->city,
            'state' => $geoipInfo->state,
            'state_name' => $geoipInfo->state_name,
            'postal_code' => $geoipInfo->postal_code,
            'lat' => $geoipInfo->lat,
            'lon' => $geoipInfo->lon,
            'timezone' => $geoipInfo->timezone,
            'continent' => $geoipInfo->continent,
            'currency' => $geoipInfo->currency,
        ];
        Counter::create($data);
    }
}
