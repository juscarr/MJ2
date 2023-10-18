let modele = document.getElementById('modele');

modele.addEventListener("change", function synchron() {

    fetch('http://localhost:8888/public/liaisons/js/categorie.php?id=' + modele.value)
        .then(response1 => response1.json())
        .then(json1 => {
            document.getElementById('couleurs').innerHTML = '';

            for (let e = 0; e < 3; e++) {
                let li = document.createElement('li');
                li.innerText = json1[i];
                document.getElementById('couleurs').appendChild(li);

            }

        })

});