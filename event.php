<?php 
/*
    An event that can be changed by name, description, presenter and the date and time the event occured
*/
class Event {
    //Properties

    public $eventName;
    public $eventDescription;
    public $eventPresenter;
    public $eventDate;
    public $eventTime;

    //Mutator Methods
    /**
     * Sets the event name
     * @param $name is the name of the event
     */
    function set_eventName($name) {
        $this->eventName = $name;
    }
    /**
     * Sets the event description
     * @param $description is the descriptio nof the event
     */
    function set_eventDescription($description) {
        $this->eventDescription = $description;
    }
    /**
     * Sets the who is presenting the event
     * @param $presenter is presenter of the event
     */
    function set_eventPresenter($presenter){
        $this->eventPresenter = $presenter;
    }
    /**
     * Sets the date of the event
     * @param $date is the date of the event
     */
    function set_eventDate($date){
        $this->eventDate = $date;
    }
    /**
     * Sets the time of the event
     * @param $time is time of the event
     */
    function set_eventTime($time) {
        $this->eventTime = $time;
    }
    //Accessor Methods
    /**
     * This gets the event name
     * @return $eventName the name of the event
     */
    function get_eventName() {
        return $this->eventName;
    }
     /**
     * This gets the event description
     * @return $eventDescription the description of the event
     */
    function get_eventDescription() {
        return $this->eventDescription;
    }
     /**
     * This gets the presenter of the event
     * @return $eventPresenter the presenter of the event
     */
    function get_eventPresenter() {
        return $this->eventPresenter;
    }
     /**
     * This gets the event date
     * @return $eventDate the date of the event
     */
    function get_eventDate() {
        return $this->eventDate;
    }
     /**
     * This gets the event time 
     * @return $eventTime the time of the event
     */
    function get_eventTime() {
        return $this->eventTime;
    }
}
?>