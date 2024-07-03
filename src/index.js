function filterTasks() {
  let input = document.getElementById('search');
  let filter = input.value.toLowerCase();
  let table = document.getElementById('task-table');
  let tr = table.getElementsByTagName('tr');

  // loop através de todas as linhas da tabela e oculta as que não correspondem a consulta do search
  for (let i = 1; i < tr.length; i++) {
    let tdTitle = tr[i].getElementsByTagName('td')[1];
    let tdDescription = tr[i].getElementsByTagName('td')[2];

    if (tdTitle || tdDescription) {
      let titleValue = tdTitle.textContent || tdTitle.innerText;
      let descriptionValue =
        tdDescription.textContent || tdDescription.innerText;

      if (
        titleValue.toLowerCase().indexOf(filter) > -1 ||
        descriptionValue.toLowerCase().indexOf(filter) > -1
      ) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }
  }
}
