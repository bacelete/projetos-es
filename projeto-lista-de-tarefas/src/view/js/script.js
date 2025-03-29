const input = document.getElementById('task-input'); 
const addTask = document.getElementById('addTask');
const options = document.querySelector('#status-select');

//task-cards
const tasksInProgress = document.getElementById('tasks-inprogress');
const taskCompleted = document.getElementById('tasks-completed');
const tasksPending = document.getElementById('tasks-pending');

const btnDelete = document.getElementById('delete');

const port = 8000;

function deletarTarefa(tarefa) {
    const nome = tarefa.textContent; 
   try {
        const req = new Request(`http://localhost:${port}/task/${nome}`, {
            method: 'DELETE', 
        });
        fetch(req)
            .then((res) => (res.text()))
            .then((res) => {
                console.log(res);
            })
    }
    catch(error) {
        console.log('Erro ao deleter a tarefa: '+error);
    
    }
}

function adicionarTarefa() {
    let strInput = input.value;

    if (strInput === "") {
        alert('Digite um nome para sua tarefa.');
        input.focus();
    } 
    if (options.value === "") {
        alert('Selecione uma opção válida.');
        options.focus();
    }
    if (strInput !== "" && typeof(strInput) === 'string' && options.value) {
        gerarTarefa(strInput, options.value);
        limparTela(); 
    }
}

function limparTela() {
    input.value = ""; 
    options.value = options[0].value; 
}

function gerarTarefa(input, option) {
    let task = document.createElement('li');
    task.innerHTML = `${input}<button id="edit"><i class="fa-solid fa-pen-to-square"></i></button>
    <button id="delete"><i class="fa-solid fa-trash"></i></button>`;
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
    salvarTarefa(task);
}

function salvarTarefa(tarefa) {
    try {
        const nome = tarefa.textContent.trim();
        let status = "";

        if (tasksPending.contains(tarefa)) {
            status = "Pendente";
        }
        if (tasksInProgress.contains(tarefa)) {
            status = "Em Progresso";
        }
        if (taskCompleted.contains(tarefa)) {
            status = "Concluído";
        }

        const req = new Request(`http://localhost:${port}/task`, {
            method: 'POST',
            mode: 'cors',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({nome, status})
        });
        fetch(req)
            .then((res) => (res.text()))
            .then((res) => {
                console.log(res);
            })
    }
    catch(error) {
        console.log(error); 
    }
}

addTask.addEventListener('click', adicionarTarefa);
document.addEventListener('click', (event) => {
    if (event.target.closest('#delete')) {
        const task = event.target.closest('.task');
        if (task) {
            task.remove();
            deletarTarefa(task);
        }
    }
});