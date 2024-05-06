document.addEventListener('DOMContentLoaded', function () {
 const apiUrl = 'https://jsonplaceholder.typicode.com/users';
 let users = [];
 let currentPage = 1;
 let usersPerPage = parseInt(document.getElementById('usersPerPage').value, 10);
 let filteredUsers = [];
 
 document.getElementById('usersPerPage').addEventListener('change', function () {
     usersPerPage = parseInt(this.value, 10);
     currentPage = 1; // Reset to the first page to avoid inconsistencies
     displayUsers(filteredUsers.length > 0 ? filteredUsers : users); // Display filtered users or all users
 });

 document.getElementById('filter').addEventListener('input', function () {
     const filterValue = this.value.toLowerCase();
     filteredUsers = users.filter(user => user.name.toLowerCase().includes(filterValue));
     currentPage = 1; // Reset to the first page due to new filter
     displayUsers(filteredUsers);
 });

 const fetchUsers = async () => {
     try {
         const response = await fetch(apiUrl);
         if (!response.ok) throw new Error('Network response was not ok.');
         users = await response.json();
         displayUsers(users);
         updatePageInfo();
     } catch (error) {
         console.error("Error fetching data: ", error);
     }
 };

 const displayUsers = (usersToDisplay) => {
     const tableContainer = document.getElementById('table-container');
     const startIndex = (currentPage - 1) * usersPerPage;
     const endIndex = startIndex + usersPerPage;
     const usersToShow = usersToDisplay.slice(startIndex, endIndex);

     let tableHtml = '<table><tr><th>Nombre</th><th>Email</th><th>Ciudad</th></tr>';
     usersToShow.forEach(user => {
         tableHtml += `<tr><td>${user.name}</td><td>${user.email}</td><td>${user.address.city}</td></tr>`;
     });
     tableHtml += '</table>';
     tableContainer.innerHTML = tableHtml;
     updatePageInfo();
 };

 const updatePageInfo = () => {
     const totalPages = Math.ceil((filteredUsers.length > 0 ? filteredUsers.length : users.length) / usersPerPage);
     const pageInfo = document.getElementById('current-page-info');
     pageInfo.textContent = `Página ${currentPage} de ${totalPages}`;
 };

 const setupPagination = () => {
     const prevPageButton = document.getElementById('prev-page');
     const nextPageButton = document.getElementById('next-page');

     prevPageButton.addEventListener('click', () => {
         if (currentPage > 1) {
             currentPage--;
             displayUsers(filteredUsers.length > 0 ? filteredUsers : users);
         }
     });

     nextPageButton.addEventListener('click', () => {
         const totalPages = Math.ceil((filteredUsers.length > 0 ? filteredUsers.length : users.length) / usersPerPage);
         if (currentPage < totalPages) {
             currentPage++;
             displayUsers(filteredUsers.length > 0 ? filteredUsers : users);
         }
     });
 };

 fetchUsers();
 setupPagination();
});
