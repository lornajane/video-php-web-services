<?php

class Events
{
    protected $events = array(
        1 => array("name" => "Excellent PHP Event",
            "date" => 1409994000,
            "location" => "Amsterdam"
        ),
        2 => array("name" => "Marvellous PHP Conference",
            "date" => 1412672400,
            "location" => "Toronto"),
        3 => array("name" => "Fantastic Community Meetup",
            "date" => 1411894800,
            "location" => "Johannesburg"
        )
    );

    /**
     * Get all the events we know about
     *
     * @return array The collection of events
     */
    public function getEvents() {
        return $this->events;
    }

    /**
     * Fetch the detail for a single event
     *
     * @param int $event_id The identifier of the event
     *
     * @return array The event data
     */
    public function getEventById($event_id) {
        if(isset($this->events[$event_id])) {
            return $this->events[$event_id];
        } else {
            throw new Exception("Event not found");
        }
    }
}
