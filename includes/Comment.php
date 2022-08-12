<?php
include_once 'dbh.php';

class Comment {
    public $orderId;
    public $comments;
    public $shipdate_expected;
    public $commentsType;
    public $commentsKeyWords = array(
        "candy" => ['candy'],
        "call" => ['call'],
        "refer" => ['referred'],
        "signature" => ['signature'],
    );
    
    function __construct($orderId, $comments, $shipdate_expected)  {
        $this->orderId = $orderId;
        $this->comments = $comments;
        $this->shipdate_expected = $shipdate_expected;
        $this->commentsType = $this->parseCommentsType() ?? 'other';
    }

    public function parseCommentsType() {
        foreach($this->commentsKeyWords as $keyWordCat => $words) {
            foreach($words as $word) {
                if(strpos($this->comments, $word) !== false) {
                    return $keyWordCat;
                }
            }
        }
    }
}

?>
