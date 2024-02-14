var tabTypes = [];
menu = document.querySelector("#selectType");
tableau = document.querySelector("#divPokemon");

fetch('index.php?action=API&goal=typeList', {
    method: 'GET'
})
    .then((response) => response.json())
    .then((tab) => {
        tab.sort((type1, type2) => type1.nom.localeCompare(type2.nom));
        tab.forEach(e => {
            option = document.createElement("option");
            option.value = e.id;
            option.innerHTML = e.nom;
            menu.appendChild(option);
        });
        
    })
    .catch((error) => {
        console.error('Error:', error);
    });

menu.addEventListener('change', function() {
    if (tableau.hasChildNodes()) {
        tableau.removeChild(tableau.firstElementChild);
    }
    idType = menu.value;
    link = 'index.php?action=API&goal=getType&id='+idType.toString();
    console.log(link);
    fetch(link, {
        method: 'GET'
    })
        .then((response) => response.json())
        .then((tab) => {
            // Crée l'entête du tableau
            table = document.createElement('table');
            thead = document.createElement('thead');
            tr = document.createElement('tr');
            thNom = document.createElement('th');
            thNom.innerHTML = 'Nom';
            tr.appendChild(thNom);
            thTaille = document.createElement('th');
            thTaille.innerHTML = 'Taille';
            tr.appendChild(thTaille);
            thPoids = document.createElement('th');
            thPoids.innerHTML = 'Poids';
            tr.appendChild(thPoids);
            thead.appendChild(tr);
            table.appendChild(thead);
            tbody = document.createElement('tbody');

            // Crée une ligne par Pokémon au sein du corps du tableau
            tab.forEach(e => {
                tr = document.createElement('tr');
                tdNom = document.createElement('td');
                a = document.createElement('a');
                a.href = 'https://www.pokepedia.fr/'+e.nom.replace(/ /g, "_");
                a.innerHTML = e.nom;
                tdNom.appendChild(a);
                tr.appendChild(tdNom);
                tdTaille = document.createElement('td');
                tdTaille.innerHTML = e.taille;
                tr.appendChild(tdTaille);
                tdPoids = document.createElement('td');
                tdPoids.innerHTML = e.poids;
                tr.appendChild(tdPoids);
                tbody.appendChild(tr);
            });
            table.appendChild(tbody);
            tableau.appendChild(table);

            // Met à jour l'historique
            
        })
        .catch((error) => {
            console.error('Error:', error);
        });
})