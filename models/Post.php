<?php
class Post
{

    public static function getPost()
    {

        $db = new Database();
        $conn = $db->connect();

        $query = "SELECT * FROM `posts`";
        $fetch = mysqli_query($conn, $query);
        return mysqli_fetch_all($fetch);

    }

}