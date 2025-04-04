<?php

class Comment
{
    private $commentID;
    private $commentText;
    private $commentDateAndTime;
    private $reviewID;
    private $userLoginID;
    private $likes;
    public function __construct($commentID, $commentText, $commentDateAndTime, $reviewID, $userLoginID, $likes)
    {
        $this->commentID = $commentID;
        $this->commentText = $commentText;
        $this->commentDateAndTime = $commentDateAndTime;
        $this->reviewID = $reviewID;
        $this->userLoginID = $userLoginID;
        $this->likes = $likes;
    }

    public function getCommentID()
    {
        return $this->commentID;
    }

    public function getCommentText()
    {
        return $this->commentText;
    }

    public function getCommentDateAndTime()
    {
        return $this->commentDateAndTime;
    }

    public function getReviewID()
    {
        return $this->reviewID;
    }

    public function getUserLoginID()
    {
        return $this->userLoginID;
    }

    public function getLikes()
    {
        return $this->likes;
    }
}