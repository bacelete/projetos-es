const input = document.getElementById('task-input'); 
const addTask = document.getElementById('addTask');
const taskList = document.getElementById('task-list');

function adicionarTarefa() {
    let strInput = input.value;
    if (strInput !== "" && typeof(strInput) === 'string') {
        gerarTarefa(strInput);
    }
}

function gerarTarefa(input) {
    let task = document.createElement('li');
    task.className = 'task'; 
    task.innerHTML = input;
    
    taskList.appendChild(task);
}

addTask.addEventListener('click', adicionarTarefa);
