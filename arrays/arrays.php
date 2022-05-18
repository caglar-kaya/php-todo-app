<?php

include "../functions.php";

class Post {
    public string $title;
    public bool $published;

    public function __construct($title, $published) {
        $this->title = $title;
        $this->published = $published;
    }
}

$posts = [
    new  Post('My first post', true),
    new  Post('My second post', true),
    new  Post('My third post', true),
    new  Post('My fourth post', false),
];

dump($posts);
dump($posts[0]);
dump($posts[0]->title); // My first post
dump($posts[0]->published); // 1

// Array Filtering
$unpublishedPosts = array_filter($posts, function ($post) {
    return ! $post->published;
});

dump($unpublishedPosts);

$publishedPosts = array_filter($posts, function ($post) {
    return $post->published;
});

dump($publishedPosts);

// Array Map
$allToTrue = array_map(function ($post) {
    $post->published = true;
    return $post;
}, $posts);

dump($allToTrue);

// foreach for Arrays
foreach ($posts as $post) {
    $post->published = false;
}

dump($posts);

// Casting
$modified = array_map(function ($post) {
    $post->published = true;
    return (array) $post;
}, $posts);

dump($modified);

// Subset of Array
$subset = array_map(function ($post) {
    return ['title' => $post->title];
}, $posts);

dump($subset);

// Array Column
$titles = array_map(function ($post) {
    return $post->title;
}, $posts);

dump($titles);

$titlesWithArrayColumn = array_column($posts, 'title');

dump($titlesWithArrayColumn);







