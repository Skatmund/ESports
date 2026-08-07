<?php

require "../config/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Game | ArenaHub</title>

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../assets/css/dashboard-design.css">

    <link rel="stylesheet"
          href="../assets/css/game-add.css">

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body>

<div class="dashboard">

    <!-- SIDEBAR -->

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

                <li>
                    <i data-lucide="user-round"></i>
                    <span>Players</span>
                </li>

                <li class="active">
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

        <!-- PAGE HEADER -->

        <header class="page-header">

            <div>

                <h1>Add New Game</h1>

                <p>Add a new esports game that can be used for tournaments.</p>

            </div>

        </header>

        <!-- FORM -->

        <form
            class="game-form"
            action="game-add-process.php"
            method="POST"
            enctype="multipart/form-data">

            <!-- BASIC INFO -->

            <div class="form-card">

                <h2>Game Information</h2>

                <div class="form-grid">

                    <div class="form-group">

                        <label>Game Name</label>

                        <input
                            type="text"
                            name="game_name"
                            placeholder="Left 4 Dead 2"
                            required>
                    </div>

                    <div class="form-group">

                        <label>Genre</label>

                        <input
                            type="text"
                            name="genre"
                            placeholder="FPS"
                            required>
                    </div>

                    <div class="form-group">

                        <label>Developer</label>

                        <input
                            type="text"
                            name="developer"
                            placeholder="Valve"
                            required>
                    </div>

                    <div class="form-group">

                        <label>Release Year</label>

                        <select name="release_year" required>

                            <option value="">Select Year</option>

                            <?php
                            $currentYear = date("Y");

                            for ($year = $currentYear; $year >= 1980; $year--) {
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group">

                        <label>Platform</label>

                        <select name="platform" required>

                            <option value="">Select Platform</option>

                            <option>PC</option>
                            <option>Mobile</option>
                            <option>Console</option>
                            <option>Cross Platform</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Maximum Team Size</label>

                        <input
                            type="number"
                            name="max_team_size"
                            required>

                    </div>

                </div>

            </div>

            <!-- GAME IMAGE -->

            <div class="form-card">

                <h2>Game Banner</h2>

                <div class="upload-box">

                    <i data-lucide="image-plus"></i>

                    <h3>Upload Banner</h3>

                    <p>PNG, JPG, or JPEG (Recommended: 1200 × 600)</p>

                    <input
                        type="file"
                        name="banner"
                        accept=".png,.jpg,.jpeg">

                </div>

            </div>

            <!-- DESCRIPTION -->

            <div class="form-card">

                <h2>Description</h2>

                <textarea
                    name="description"
                    rows="7"></textarea>

            </div>

            <!-- TOURNAMENT SETTINGS -->

            <div class="form-card">

                <h2>Default Tournament Settings</h2>

                <div class="form-grid">

                    <div class="form-group">

                        <label>Match Format</label>

                        <select name="default_match_format">

                            <option>Best of 1</option>
                            <option>Best of 3</option>
                            <option>Best of 5</option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Bracket Type</label>

                        <select name="default_bracket_type">

                            <option>Single Elimination</option>
                            <option>Double Elimination</option>
                            <option>Round Robin</option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- ACTIONS -->

            <div class="form-actions">

                <button type="button"
                        class="secondary-btn">

                    Cancel

                </button>

                <button type="submit"
                        class="primary-btn">

                    <i data-lucide="plus-circle"></i>

                    Add Game

                </button>

            </div>

        </form>

    </main>

</div>

<script>

lucide.createIcons();

</script>

</body>

</html>