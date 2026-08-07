<?php

require "../config/database.php";

$game_name = $_POST['game_name'];
$genre = $_POST['genre'];
$developer = $_POST['developer'];
$release_year = $_POST['release_year'];
$platform = $_POST['platform'];
$max_team_size = $_POST['max_team_size'];
$description = $_POST['description'];
$match_format = $_POST['default_match_format'];
$bracket_type = $_POST['default_bracket_type'];

/*
We'll upload the image later.
*/
$banner = "default-game-banner.jpg";

$stmt = $conn->prepare("
INSERT INTO games
(
    game_name,
    genre,
    developer,
    release_year,
    platform,
    max_team_size,
    banner,
    description,
    default_match_format,
    default_bracket_type
)
VALUES
(?,?,?,?,?,?,?,?,?,?)
");

$stmt->bind_param(
    "sssssissss",
    $game_name,
    $genre,
    $developer,
    $release_year,
    $platform,
    $max_team_size,
    $banner,
    $description,
    $match_format,
    $bracket_type
);

if ($stmt->execute()) {

    header("Location: game-view.html?success=1");
    exit();

} else {

    echo "Error: " . $stmt->error;

}