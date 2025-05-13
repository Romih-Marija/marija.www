<?php
class EventHolderController extends PageController
{
    protected function init()
    {
        parent::init();
    }
    public function getUpcomingEvents()
    {
        $now = date('Y-m-d');

        return EventPage::get()
            ->filter('DatumDo:GreaterThanOrEqual', $now)
            ->sort('DatumDo', 'ASC'); // najbližji dogodki najprej
    }

    public function getPastEvents()
    {
        $now = date('Y-m-d');

        return EventPage::get()
            ->filter('DatumDo:LessThan', $now)
            ->sort('DatumDo', 'DESC'); // najnovejši pretekli dogodki najprej
    }
}