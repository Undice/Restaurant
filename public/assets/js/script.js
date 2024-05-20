// let card = document.getElementsByClassName("card");

// // faire une boucle qui va prendre en compte toutr ce qu'il y a en dessous (pour chaque section) et qui va changer le 0 en l'indice

// let imgCard = document.getElementsByClassName("img-card")[0];
// let textCard = document.getElementsByClassName("text-card")[0];

// console.log(textCard);

// textCard.addEventListener('mouseover', (event) => {
//     console.log('in');
//     event.target.classList.add('width100');
//     imgCard.classList.add('d-none');
// })

// textCard.addEventListener('mouseout', (event) => {
//     event.target.classList.remove('width100')
//     imgCard.classList.remove('d-none');
// })

// imgCard.addEventListener('mouseover', (event) => {
//     event.target.classList.add('width100');
//     textCard.classList.add('d-none');
// })

// imgCard.addEventListener('mouseout', (event) => {
//     event.target.classList.remove('width100');
//     textCard.classList.remove('d-none');
// })

let mdpChange = document.getElementById("mdpChange");
let mdpHide = document.getElementById("mdpHide");

if (mdpChange != null) {
    mdpChange.addEventListener('click', function () {
        if (mdpHide.classList.contains('d-none')) {
            mdpHide.classList.replace('d-none', 'd-block');
        }
        else {
            mdpHide.classList.replace('d-block', 'd-none');
        }
    });
}

let select = document.getElementById('dept');

function selectDept() {
    let idDept = $('#dept').val();
    // console.log(idDept);
    if (idDept == ''){
        villesDept.innerHTML = "";
        let premiereOption = document.createElement('option');
        premiereOption.text = "Sélectionnez d'abord un département";
        villesDept.appendChild(premiereOption);
    } else {
        $.ajax({
            url: '../controller/ajax.php',
            method: 'GET',
            dataType: 'json',
            data: { idDepartement: idDept },
            success: function (reponse) {
                console.log(reponse);
                let villesDept = document.getElementById('villeDept');
                villesDept.innerHTML = "";
                let premiereOption = document.createElement('option');
                premiereOption.text = "Sélectionnez une ville";
                villesDept.appendChild(premiereOption);
                for (let i = 0; i < reponse.length; i++) {
                    let cp = reponse[i].code_postal;
                    console.log(typeof(cp));
                    let tabCps = cp.split('-');
                    for (let j = 0; j < tabCps.length; j++) {
                        let option = document.createElement('option');
                        console.log(tabCps);
                        option.value = reponse[i].id_ville + '-' + tabCps[j];
                        option.text = reponse[i].nom_ville + ' (' + tabCps[j] + ')';
                        villesDept.appendChild(option);
                    }
                }
            }
        })
    }
}

if (select != null) {
    select.addEventListener('change', selectDept);
}



let eye = document.getElementById('eye');

if (eye != null) {
    eye.addEventListener('click', function () {
        togglePassword();
        eye.classList.toggle('bi-eye-slash-fill')
    });
}

function togglePassword() {
    let mdp = document.getElementById('mdp');
    let mdpConfirm = document.getElementById('mdpConfirm');

    if (mdp.type === "password") {
        mdp.type = "text";
        if (mdpConfirm) {
            mdpConfirm.type = "text";
        }

    } else {
        mdp.type = "password";
        if (mdpConfirm) {
            mdpConfirm.type = "password";
        }
    }
};