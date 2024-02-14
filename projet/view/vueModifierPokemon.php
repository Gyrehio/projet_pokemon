<?php $this->titre = 'Modifier Pokémon'; ?>

<h1>Modifier Pokémon</h1>
<form action="<?= $_SERVER["PHP_SELF"].'?action=modifyPokemon' ?>" method="POST">
    <p id="pokemon">
        <label>Pokémon : </label>
        <select id="selectPokemon" name="idPokemon">
            <?php foreach ($data as $pok) {
                echo "<option value=".$pok->getId().">".$pok->getNom()."</option>";
            } ?>
        </select>
    </p>
    <p>
        <label>Taille : </label>
        <input id="taillePokemon" type="number" name="taillePokemon" required="1">
    </p>
    <p>
        <label>Poids : </label>
        <input id="poidsPokemon" type="number" name="poidsPokemon" required="1">
    </p>
    <p>
        <input type="submit">
    </p>
    <p>
        <label <?php if ($result) echo 'id=\'success';?>'>
            <?php if ($result) echo 'La requête a bien été prise en compte !'; ?>
        </label>
    </p>
