<?php

require '../../config/database.php';

$games = $conn->query("
    SELECT game_id, game_name
    FROM games
    ORDER BY game_name
");

$players = $conn->query("
    SELECT player_id, ign
    FROM players
    ORDER BY ign
");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Team | ArenaHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/dashboard-design.css">
    <link rel="stylesheet" href="../../assets/css/add-team.css">

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body>

<div class="dashboard">

    <aside class="sidebar">

        <div class="sidebar-top">
            <div class="logo">

                <div class="logo-icon">🎮</div>

                <h2>ArenaHub</h2>

            </div>
            <ul class="sidebar-menu">

                <li>
                    <i data-lucide="layout-dashboard"></i>
                    <span>Dashboard</span>
                </li>

                <li>
                    <i data-lucide="trophy"></i>
                    <span>Tournaments</span>
                </li>

                <li>
                    <i data-lucide="users"></i>
                    <span>Teams</span>
                </li>

                <li class="active">
                    <i data-lucide="user-round"></i>
                    <span>Players</span>
                </li>

                <li>
                    <i data-lucide="gamepad-2"></i>
                    <span>Games</span>
                </li>

                <li>
                    <i data-lucide="calendar-days"></i>
                    <span>Schedule</span>
                </li>

                <li>
                    <i data-lucide="git-branch"></i>
                    <span>Brackets</span>
                </li>

                <li>
                    <i data-lucide="bar-chart-3"></i>
                    <span>Analytics</span>
                </li>
            </ul>
        </div>

    </aside>

    <main class="main-content">

        <header class="page-header">

            <h1>Add Team</h1>

            <p>
                Register a new esports team.
            </p>

        </header>

        <form
            class="team-form"
            action="add-team-process.php"
            method="POST"
            enctype="multipart/form-data">

            <!-- TEAM INFO -->

            <div class="form-card">

                <h2>Team Information</h2>

                <div class="form-grid">

                    <div class="form-group">
                        <label>Team Name</label>
                        <input type="text" name="team_name">
                    </div>

                    <div class="form-group">
                        <label>Team Tag</label>
                        <input type="text" name="team_tag">
                    </div>

                    <div class="form-group">
                        <label>Game</label>

                    <select name="game_id" required>

                        <?php while($game = $games->fetch_assoc()) { ?>

                            <option value="<?= $game['game_id']; ?>">

                                <?= htmlspecialchars($game['game_name']); ?>

                            </option>

                        <?php } ?>

                    </select>

                    </div>

                    <div class="form-group">
                        <label>Captain</label>
                        <input type="text" name="captain">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact_number">
                    </div>

                    <div class="form-group">
                        <label>Organization</label>
                        <input type="text" name="organization">
                    </div>

                </div>

            </div>

            <!-- LOGO -->

            <div class="form-card">

                <h2>Team Logo</h2>

                <div class="upload-box" id="uploadBox">

                    <i data-lucide="image-plus"></i>

                    <p id="fileName">Upload Team Logo</p>

                    <input
                        type="file"
                        id="logo"
                        name="logo"
                        accept=".png,.jpg,.jpeg"
                        hidden>

                </div>

            </div>

            <!-- PLAYERS -->

            <div class="form-card">

                <h2>Roster</h2>

                <div class="player-list">

                <div class="player-list" id="playerList">

                    <div class="player-list" id="playerList">

                        <?php for($i = 1; $i <= 4; $i++) { ?>

                            <select name="players[]">
                                <option value="">Select Player</option>

                                <?php while($player = $players->fetch_assoc()) { ?>
                                    <option value="<?= $player['player_id']; ?>">
                                        <?= htmlspecialchars($player['ign']); ?>
                                    </option>
                                <?php } ?>
                            </select>

                        <?php } ?>

                    </div>

                </div>

                </div>
                <button
                    type="button"
                    id="addSubstitute"
                    class="secondary-btn">

                    + Add Substitute

                </button>

            </div>

            <!-- BUTTONS -->

            <div class="form-buttons">

                <button
                    type="button"
                    class="cancel-btn">

                    Cancel

                </button>

                <button
                    type="submit"
                    class="create-btn">

                    Register Team

                </button>

            </div>

        </form>

    </main>

</div>

<script>lucide.createIcons();</script>
<script src="../../assets/js/add-player.js"></script>

</body>

</html>