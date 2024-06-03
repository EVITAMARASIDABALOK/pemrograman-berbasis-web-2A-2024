let tasks = [];

function addTask() {
  const taskInput = document.getElementById("taskInput");
  const taskName = taskInput.value.trim();
  if (taskName !== "") {
    tasks.push({ name: taskName, done: false });
    displayTasks();
    taskInput.value = "";
  }
}

function displayTasks() {
  const taskList = document.getElementById("taskList");
  taskList.innerHTML = "";
  tasks.forEach((task, index) => {
    const listItem = document.createElement("li");
    listItem.textContent = task.name;
    if (task.done) {
      listItem.classList.add("done");
    }
    // Tambahkan tombol hapus
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Hapus";
    deleteButton.addEventListener("click", () => deleteTask(index));
    listItem.appendChild(deleteButton);
    
    // Tambahkan tombol ubah
    const editButton = document.createElement("button");
    editButton.textContent = "Ubah";
    editButton.addEventListener("click", () => editTask(index));
    listItem.appendChild(editButton);
    
    // Tambahkan tombol tandai selesai
    const toggleButton = document.createElement("button");
    toggleButton.textContent = task.done ? "Batal Selesai" : "Tandai Selesai";
    toggleButton.addEventListener("click", () => toggleTask(index));
    listItem.appendChild(toggleButton);
    
    taskList.appendChild(listItem);
  });
}

function toggleTask(index) {
  tasks[index].done = !tasks[index].done;
  displayTasks();
}

function deleteTask(index) {
  tasks.splice(index, 1);
  displayTasks();
}

function editTask(index) {
  const newName = prompt("Masukkan nama tugas baru:");
  if (newName !== null) {
    tasks[index].name = newName.trim();
    displayTasks();
  }
}

// Initial display of tasks
displayTasks();

