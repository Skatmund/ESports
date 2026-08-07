const addButton = document.getElementById("addSubstitute");
const playerList = document.getElementById("playerList");

addButton.addEventListener("click", function(){

    const select = document.createElement("select");

    select.name = "players[]";

    select.innerHTML = `
        <option value="">Select Substitute</option>

        <?php
        $players->data_seek(0);

        while($player = $players->fetch_assoc()){
        ?>

            <option value="<?= $player['player_id']; ?>">
                <?= htmlspecialchars($player['ign']); ?>
            </option>

        <?php } ?>
    `;

    playerList.appendChild(select);

});