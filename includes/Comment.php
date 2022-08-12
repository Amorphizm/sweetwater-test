<?php
include_once 'dbh.php';

class Comment {
    protected $orderId;
    protected $comments;
    protected $shipdate_expected;
    protected $commentType;
    
    function __construct($orderId, $comments, $shipdate_expected)  {
        $this->orderId = $orderId;
        $this->$comments = $comments;
        $this->shipdate_expected = $shipdate_expected;
    }

    function parseCommentType(str $comments) {
        echo $this->comments;
    }
}

?>
