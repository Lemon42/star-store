window.onload = initPage;

var inputNome = document.getElementById('nome');
var inputUniverso = document.getElementById('universo');
var inputCapacidade = document.getElementById('capacidade');
var inputDescricao = document.getElementById('descricao');
var inputValor = document.getElementById('valor');

function initPage(){
	inputNome.value = nave.nome;
	inputUniverso.value = nave.universo;
	inputCapacidade.value = nave.capacidade;
	inputDescricao.value = nave.descricao;
	inputValor.value = nave.valor;
}

function ComparaDados(input, valor) {
	if (input.value != valor) {
		input.classList.remove('is-info');
		input.classList.add('is-warning');
	} else {
		input.classList.remove('is-warning');
		input.classList.add('is-info');
	}
}

inputNome.addEventListener('keyup', event => {
	ComparaDados(inputNome, nave.nome);
});

inputUniverso.addEventListener('keyup', event => {
	ComparaDados(inputUniverso, nave.universo);
});

inputCapacidade.addEventListener('keyup', event => {
	ComparaDados(inputCapacidade, nave.capacidade);
});

inputDescricao.addEventListener('keyup', event => {
	ComparaDados(inputDescricao, nave.descricao);
});

inputValor.addEventListener('keyup', event => {
	ComparaDados(inputValor, nave.valor);
});

