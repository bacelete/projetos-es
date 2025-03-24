const input = document.getElementById('task-input'); 
const addTask = document.getElementById('addTask');
const taskList = document.getElementById('task-list');
const options = document.querySelector('#status-select');

const port = 8000;

function adicionarTarefa() {
    let strInput = input.value;

    if (strInput !== "" && typeof(strInput) === 'string' && options.value) {
        gerarTarefa(strInput, options.value);
    }
}

function gerarTarefa(input, option) {
    let task = document.createElement('li');
    task.className = 'task'; 
    task.innerHTML = input;

    let obj = {nome: input, status: option};
    
    salvarTarefa(obj);
    taskList.appendChild(task);
}

function salvarTarefa(tarefa) {
    try {
        const request = new Request(`http://localhost:${port}/task`, {
            method: 'POST',
            mode: 'cors',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({nome: tarefa.nome, status: tarefa.status})
        });
        fetch(request)
            .then((response) => {
                if (response.status === 200) {
                    return response.json(); 
                }
                else {
                    throw new Error('Houve um erro durante a criação da tarefa');
                }
            })
            .then((data) => {
                console.log('Tarefa criada com sucesso: '+JSON.stringify(data)); 
            })
    }
    catch(error) {
        console.log(error); 
    }
}

addTask.addEventListener('click', adicionarTarefa);
