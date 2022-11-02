function indigo() {
    document.getElementById('right').style.backgroundColor = "indigo";
}

function Ala() {
    document.getElementById('right').style.backgroundColor = "steelblue";
}

function change_to_olive() {
    document.getElementById('right').style.backgroundColor = "olive";
}

function color() {
    let x = document.getElementById('list').value;
    document.getElementById('right').style.color = x;
}

function size() {
    let x = document.getElementById('rozmiar').value;
    document.getElementById('right').style.fontSize = x;
}


const change_border = () => {
    if (document.getElementById('box').checked) {
        document.getElementById('img').style.border = '1px solid white';
    } else {
        document.getElementById('img').style.border = 'none';
    }
}

function radio(rad) {
    let r = document.getElementById('lista2');
    if (rad == 'dysk') {
        r.style.listStyle = 'disc';
    }
    if (rad == 'kwadrat') {
        r.style.listStyle = 'square';
    }
    if (rad == 'okrąg') {
        r.style.listStyle = 'circle';
    }

}