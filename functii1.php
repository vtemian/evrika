<?php
	function outputCalendarList($client)
{
  $gdataCal = new Zend_Gdata_Calendar($client);
  $calFeed = $gdataCal->getCalendarListFeed();
  echo '<h1>' . $calFeed->title->text . '</h1>';
  echo '<ul>';
  foreach ($calFeed as $calendar) {
    echo '<li>' . $calendar->title->text . '</li>';
  }
  echo '</ul>';
}
function outputCalendar($client)
{
  $gdataCal = new Zend_Gdata_Calendar($client);
  $eventFeed = $gdataCal->getCalendarEventFeed();
  echo "<ul>\n";
  foreach ($eventFeed as $event) {
    echo "\t<li>" . $event->title->text .  " (" . $event->id->text . ")\n";
    echo "\t\t<ul>\n";
    foreach ($event->when as $when) {
      echo "\t\t\t<li>Starts: " . $when->startTime . "</li>\n";
    }
    echo "\t\t</ul>\n";
    echo "\t</li>\n";
  }
  echo "</ul>\n";
}
function createEvent ($client, $title = 'Tennis with Beth',
    $desc='Meet for a quick lesson', $where = 'On the courts',
    $startDate = '2010-03-27', $startTime = '10:00',
    $endDate = '2010-03-28', $endTime = '11:00', $tzOffset = '-08')
{
  $gdataCal = new Zend_Gdata_Calendar($client);
  $newEvent = $gdataCal->newEventEntry();

  $newEvent->title = $gdataCal->newTitle($title);
  $newEvent->where = array($gdataCal->newWhere($where));
  $newEvent->content = $gdataCal->newContent("$desc");

  $when = $gdataCal->newWhen();
  $when->startTime = "{$startDate}T{$startTime}:00.000{$tzOffset}:00";
  $when->endTime = "{$endDate}T{$endTime}:00.000{$tzOffset}:00";
  $newEvent->when = array($when);

  // Upload the event to the calendar server
  // A copy of the event as it is recorded on the server is returned
  $createdEvent = $gdataCal->insertEvent($newEvent);
  return $createdEvent->id->text;
}
?>