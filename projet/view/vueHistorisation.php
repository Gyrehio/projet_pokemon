<?php $this->titre = 'Historisation'; ?>

<h1>Historisation des opérations modifiant la base</h1>

<h2>Modifier</h2>
<table>
    <thead>
        <tr>
            <th>Horodatage</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($modifier as $key => $val) {
            echo '<tr><td>'.$key.'</td><td>'.$val.'</td></tr>';
        } ?>
    </tbody>
</table>

<h2>Voir</h2>
<table>
    <thead>
        <tr>
            <th>Horodatage</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($voir as $key => $val) {
            echo '<tr><td>'.$key.'</td><td>'.$val.'</td></tr>';
        } ?>
    </tbody>
</table>

<h2>Autres</h2>
<table>
    <thead>
        <tr>
            <th>Horodatage</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($autres as $key => $val) {
            echo '<tr><td>'.$key.'</td><td>'.$val.'</td></tr>';
        } ?>
    </tbody>
</table>