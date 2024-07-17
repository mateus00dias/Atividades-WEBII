const urlBase = 'http://localhost';
let dados = [];

function desenhaTabela() {
    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '';
    for (let i = 0; i < dados.length; i++) {
        const tr = document.createElement('tr');
        const btEx = document.createElement('button');
        const btEd = document.createElement('button');

        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');

        btEx.innerText = '-';
        btEx.setAttribute('data-id', dados[i].id);
        btEx.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            alternaModal();
            enviaDadosParaDelecao(id);
        });

        btEd.innerText = '.';
        btEd.setAttribute('data-index', i);
        btEd.addEventListener('click', (e) => {
            const index = e.target.getAttribute('data-index');
            alternaModal();
            preencheFormParaEdicao(index);
        });

        td1.innerText = dados[i].id;
        td2.innerText = dados[i].fabricante;
        td3.innerText = dados[i].modelo;
        td4.append(btEd, btEx);

        tr.append(td1, td2, td3, td4);
        tbody.append(tr);
    }
}

function carregaDados() {
    fetch(`${urlBase}/index.php?mod=veiculo&acao=lista`)
        .then((res) => {
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            //alert(json);
            dados = json;
            desenhaTabela();
        })
}

function enviaDadosParaCadastro() {
    const dados = new FormData(document.querySelector('form'));
    const opcoes = {
        method: 'post',
        body: dados
    };
    fetch(`${urlBase}/index.php?mod=veiculo&acao=novo`, opcoes)
        .then((res) => {
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            alert(json.mensagem);
            carregaDados();
        })
    alternaModal();
}

function enviaDadosParaDelecao(id) {
    const dados = new FormData();
    dados.append('input_id', id);
    const opcoes = {
        method: 'post',
        body: dados
    };
    fetch(`${urlBase}/index.php?mod=veiculo&acao=exclui`, opcoes)
        .then((res) => {
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            alert(json.mensagem);
            carregaDados();
        })
    alternaModal();
}

function preencheFormParaEdicao(index) {
    document.querySelector('#input_id').value = dados[index].id;
    document.querySelector('#input_fabricante').value = dados[index].fabricante;
    document.querySelector('#input_modelo').value = dados[index].modelo;
}

function enviaDadosParaEdicao() {
    const dados = new FormData(document.querySelector('form'));
    const opcoes = {
        method: 'post',
        body: dados
    };
    fetch(`${urlBase}/index.php?mod=veiculo&acao=altera`, opcoes)
        .then((res) => {
            return res.json();
        })
        .then((json) => {
            //console.log(json);
            alert(json.mensagem);
            carregaDados();
        })
    alternaModal();
}

function alternaModal() {
    document.querySelector('#modal').classList.toggle('mostrarModal');
}

document.querySelector('form button').addEventListener('click', (e) => {
    e.preventDefault();
    if (document.querySelector('#input_id').value) {
        enviaDadosParaEdicao();
    } else {
        enviaDadosParaCadastro();
    }
    document.querySelector('#input_id').value = '';
    e.target.parentNode.reset();
});



document.querySelector('#btNovo').addEventListener('click', alternaModal);
window.addEventListener('load', carregaDados);
