function submitForm() {
    const name = document.getElementById('name').value;
    const age = document.getElementById('age').value;
  
    if (!validateInput(name, age)) {
      alert('Please enter valid information.');
      return;
    }
  
    const userData = {
      name,
      age
    };
  
    let users = JSON.parse(localStorage.getItem('users')) || [];
    users.push(userData);
    localStorage.setItem('users', JSON.stringify(users));
  
    window.location.href = 'users.html';
  }
  
  function validateInput(name, age) {
    const nameRegex = /^[A-Za-z ]+$/;
    const ageRegex = /^[0-9]+$/;
  
    return nameRegex.test(name) && ageRegex.test(age);
  }
  
  function displayUserData() {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    const table = document.getElementById('userData');
  
    users.forEach(user => {
      const row = table.insertRow();
      const cell1 = row.insertCell(0);
      const cell2 = row.insertCell(1);
  
      cell1.innerHTML = user.name;
      cell2.innerHTML = user.age;
  
      const deleteButton = document.createElement('button');
      deleteButton.textContent = 'Delete';
      deleteButton.onclick = function() {
        deleteUser(user);
      };
      row.appendChild(deleteButton);
    });
  }
  
  function deleteUser(user) {
  let users = JSON.parse(localStorage.getItem('users')) || [];
  users = users.filter(u => u.name !== user.name || u.age !== user.age);
  localStorage.setItem('users', JSON.stringify(users));

  window.location.reload();
}
  
  function clearAllUsers() {
    localStorage.removeItem('users');
  
    window.location.reload();
  }
  
  if (window.location.href.includes('users.html')) {
    displayUserData();
  }
  