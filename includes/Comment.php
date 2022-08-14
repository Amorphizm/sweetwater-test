<?php

class Comment {
    public $orderId;
    public $comments;
    public $shipdate_expected;
    public $commentsType;
    public $commentsKeyWords = array(
        "candy" => ['candy', 'smarties', 'taffy'],
        "call" => ['call', 'phone'],
        "refer" => ['referred', 'referral'],
        "signature" => ['sign', 'signature'],
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
                if(preg_match("/\b{$word}\b/i", $this->comments)) {
                    return $keyWordCat;
                }
            }
        }
    }
}

?>
