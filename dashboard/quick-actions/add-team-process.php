<?php

require '../login/login-process.php';

$team_name = $_POST['team_name'];
$team_tag = $_POST['team_tag'];
$game_id = $_POST['game_id'];
$captain = $_POST['captain'];
$email = $_POST['email'];
$contact = $_POST['contact_number'];
$organization = $_POST['organization'];

$stmt = $conn->prepare("
INSERT INTO teams
(
    team_name,
    team_tag,
    game_id,
    captain_name,
    contact_email,
    contact_number,
    organization
)
VALUES
(?,?,?,?,?,?,?)
");

$stmt->bind_param(
    "ssissss",
    $team_name,
    $team_tag,
    $game_id,
    $captain,
    $email,
    $contact,
    $organization
);

$stmt->execute();

header("Location: team-management.php");
exit();