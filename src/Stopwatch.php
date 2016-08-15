<?php

use mysqli;

class Stopwatch
{
    private $mysqli;
    private $stopwatchId;

    public function __construct(mysqli $mysqli, $stopwatchId)
    {
        $this->mysqli = $mysqli;
        $this->stopwatchId = $stopwatchId;
    }

    public function start()
    {
        $timestamp = time();

        $query = "INSERT INTO stopwatch(chat_id, timestamp)
            VALUES('$this->stopwatchId', '$timestamp')
            ON DUPLICATE KEY UPDATE timestamp = '$timestamp'";

        return $this->mysqli->query($query);
    }

    public function stop()
    {
        $query = "DELETE FROM stopwatch WHERE chat_id = $this->stopwatchId";

        return $this->mysqli->query($query);
    }

    public function status()
    {
        $query = "SELECT timestamp FROM stopwatch WHERE chat_id = $this->stopwatchId";
        $timestamp = $this->mysqli->query($query)->fetch_row();

        if (!empty($timestamp)) {
            return gmdate('H:i:s', time() - reset($timestamp));
        }
    }
}
