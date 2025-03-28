const input = document.getElementById('task-input'); 
const addTask = document.getElementById('addTask');
const tasksInProgress = document.getElementById('tasks-inprogress');
const taskCompleted = document.getElementById('tasks-completed');
const tasksPending = document.getElementById('tasks-pending');

const options = document.querySelector('#status-select');

const port = 8000;

function adicionarTarefa() {
    let strInput = input.value;

    if (strInput !== "" && typeof(strInput) === 'string' && options.value) {
        gerarTarefa(strInput, options.value);
    }

    limparTela(); 
}

function limparTela() {
    input.value = ""; 
    options.value = options[0].value; 
}

function gerarTarefa(input, option) {
    let task = document.createElement('li');
    task.innerHTML = input;
    task.className = "task";

    if (option === "Pendente") {
        tasksPending.appendChild(task);
    }
    if (option === "Em Progresso") {
        tasksInProgress.appendChild(task);
    }
    if (option === "Concluído") {
        taskCompleted.appendChild(task);
    }


}

function salvarTarefa(tarefa) {
    try {
        const req = new Request(`http://localhost:${port}/task`, {
            method: 'POST',
            mode: 'cors',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({nome: tarefa.nome, status: tarefa.status})
        });
        fetch(req)
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
