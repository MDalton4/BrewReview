<?php

session_start();

require "vendor/autoload.php";
require "database/generated-conf/config.php";
require "sessionAuth.php";

use Propel\Runtime\ActiveQuery\Criteria;

if(isset($_POST['page'])) {
    $friends = FriendQuery::create()
        ->select(array('friend_username'))
        ->findByUsername($_SESSION['username']);

    $offset = intval($_POST['page']) + 20;

    $feedPosts = PostQuery::create()
        ->filterByUsername($friends)
        ->orderByCreationtime(Criteria::DESC)
        ->offset($offset)
        ->limit(10)
        ->find();

    if(empty($feedPosts)) {
        echo "End.";
    }
    else {
        $feed = "";

        foreach($feedPosts as $post) {
            $username = $post->getUsername();
            $timestamp = $post->getCreationtime();
            $body = $post->getBody();
            $id = "";
            $drink = "";
            $rating = "";
            if(($review = $post->getReview()) !== null) {
                $id = $review->getDrinkId();
                $drink = " &#x3e; <a href='drink/?d=$id>'" . $review->getDrink()->getName() . "</a>";
                $rating = "<p class='rating'>" . $review->getRating() . "</p>";
            }
            $feed .=
                "<div class='feed-post'><p><a href='profile/?u=$username'>$username</a>$drink</p>$rating<p>Posted on $timestamp</p><p>$body</p></div>";
        }

        echo $feed;
    }
}
else{
    echo "ERROR: No page value received.";
}
?>