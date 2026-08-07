<?php

require '../../config/database.php';

$team_name = $_POST['team_name'];
$team_tag = $_POST['team_tag'];
$game_id = $_POST['game_id'];
$captain = $_POST['captain'];
$email = $_POST['email'];
$contact = $_POST['contact_number'];
$organization = $_POST['organization'];

$logo = "";
$targetDir = "../../uploads/team-logos/";

// Create folder if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Check if a logo was uploaded
if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {

    $extension = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($extension, $allowed)) {

        $logo = uniqid("team_") . "." . $extension;

        move_uploaded_file(
            $_FILES['logo']['tmp_name'],
            $targetDir . $logo
        );
    }
}

// Insert team
$stmt = $conn->prepare("
INSERT INTO teams
(
    team_name,
    team_tag,
    game_id,
    captain_name,
    contact_email,
    contact_number,
    organization,
    logo
)
VALUES
(?,?,?,?,?,?,?,?)
");

$stmt->bind_param(
    "ssisssss",
    $team_name,
    $team_tag,
    $game_id,
    $captain,
    $email,
    $contact,
    $organization,
    $logo
);

$stmt->execute();

$team_id = $conn->insert_id;

if(isset($_POST['players'])){

    $playerStmt = $conn->prepare("
        INSERT INTO team_players (team_id, player_id)
        VALUES (?, ?)
    ");

    foreach($_POST['players'] as $player_id){

        if(empty($player_id)){
            continue;
        }

        $playerStmt->bind_param("ii", $team_id, $player_id);
        $playerStmt->execute();
    }
}

header("Location: ../team-management.php");
exit();