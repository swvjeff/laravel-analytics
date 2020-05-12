<?php

namespace Swvjeff\Analytics;

class Analytics
{
    private $primaryTrackingId;

    private $secondaryTrackingIds;

    public function __construct($primaryTrackingId, $secondaryTrackingIds)
    {
        $this->primaryTrackingId = $primaryTrackingId;
        $this->secondaryTrackingIds = $secondaryTrackingIds;
    }

    public function addTrackingId($trackingId)
    {
        if( ! empty($trackingId) && $trackingId !== $this->primaryTrackingId && ! in_array($trackingId, $this->secondaryTrackingIds, true)) {
            $this->secondaryTrackingIds[] = $trackingId;
        }
        return $this;
    }

    public function render()
    {
        if( ! empty($this->primaryTrackingId)) {
            return view('laravel-analytics::analytics')->with('trackingId', $this->primaryTrackingId)->with('secondaryTrackingIds', $this->secondaryTrackingIds);
        }
    }
}