<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8'/>
        <base href="/projet/">
        <link href='public/css/styles.css' rel='stylesheet' type='text/css'>
        <title>Application Pokémon - <?= $titre ?></title>
    </head>
    <body>
        <header>
            <table>
                <tbody>
                    <tr>
                        <td><a href='index.php'>Accueil</a></td>
                        <td><a href='index.php?action=testFrancais'>Test - Français</a></td>
                        <td><a href='index.php?action=testOriginal'>Test - Original</a></td>
                        <td><a href='index.php?action=modifyPokemon'>Modifier Pokémon</a></td>
                        <td><a href='index.php?action=historique'>Historisation</a></td>
                        <td><a href='index.php?action=printPokemon'>Afficher Pokémon</a></td>
                    </tr>
                </tbody>
            </table>
        </header>
        <div id='content'><?= $contenu ?></div>
        <footer>
            <table>
                <tbody>
                    <tr>
                        <td>Licence 3 Informatique</td>
                        <td><?= date('d-m-Y H:i:s') ?></td>
                    </tr>
                </tbody>
            </table>
        </footer>
    </body>
</html>