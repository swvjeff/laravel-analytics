<?php

namespace Swvjeff\Analytics;

use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;

class Analytics
{
    private $primaryTrackingId;

    private $secondaryTrackingIds = [];

    public function __construct($primaryTrackingId, $secondaryTrackingIds)
    {
        $this->primaryTrackingId = $primaryTrackingId;
        $this->secondaryTrackingIds = $secondaryTrackingIds;
    }

    public function addTrackingId($trackingId)
    {
        if($trackingId !== $this->primaryTrackingId && ! in_array($trackingId, $this->secondaryTrackingIds)) {
            $this->secondaryTrackingIds[] = $trackingId;
        }
        return $this;
    }

    public function render()
    {
        return view('laravel-analytics::analytics')->with('trackingId', $this->primaryTrackingId)->with('secondaryTrackingIds', $this->secondaryTrackingIds);
    }
}