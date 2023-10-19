let btnRadio1 = document.getElementById('bande-dessine');
let btnRadio2 = document.getElementById('bande-dessine-jeunesse');
let btnRadio3 = document.getElementById('livre-illustre');
let btnRadio4 = document.getElementById('album-jeunesse');
let btnRadio5 = document.getElementById('documentaire');
let btnRadio6 = document.getElementById('divers');

let tBtnRadio = [btnRadio1, btnRadio2, btnRadio3, btnRadio4, btnRadio5, btnRadio6]

for (let i = 0; i < tBtnRadio.length; i++) {
    tBtnRadio[i].addEventListener("click", checkboxActif)
}

function checkboxActif() {
    for (let i = 0; i < tBtnRadio.length; i++) {
        if (tBtnRadio[i].checked) {
            synchron(tBtnRadio[i].value);
        }
    }
}


function synchron(categories) {
    fetch('http://localhost:8888/Rpni/MJ2/public/index.php?controleur=livre&action=index&categorie=' + categories)
        .then(response => response.json())
        .then(json1 => {
                console.log(json1)
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'livres';
                hiddenInput.value = JSON.stringify(json1);

                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'http://localhost:8888/Rpni/MJ2/public/index.php?controleur=livre&action=index&categorie=' + categories;
                form.appendChild(hiddenInput);

                document.body.appendChild(form);

                form.submit();

                // document.getElementById('catalogue-liste').innerHTML = '';
                // for (let e = 0; e < json1.length; e++) {
                //     console.log(json1)
                //     let li = document.createElement('li');
                //     li.innerHTML = json1[e]['titre'];
                //     document.getElementById('catalogue-liste').appendChild(li);
                //
                // }
            }
        )
}