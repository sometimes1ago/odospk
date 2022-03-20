todoListInit();
function todoListInit() {
  let listItems = document.querySelectorAll('.todo-note');
  let asideMenu = document.querySelector(".todo-actions");
  let todoList = document.querySelector('.todo-list__default');

  listItems.forEach((item) => {
    item.addEventListener('click', () => {
      item.classList.toggle('todo-note__selected');

      let activeItems = document.querySelectorAll('.todo-note__selected');
      todoList.classList.remove('todo-list__default');

      let elems = updateArray(); 
      function updateArray () {
        let elements = [];
        activeItems.forEach(item  => elements.push(item.textContent));
        return elements;
      }

      asideMenu.classList.add('todo-actions__visible');
      todoList.classList.add('todo-list__opened');
      
      if (activeItems.length == 0) {
        asideMenu.classList.remove('todo-actions__visible');
        todoList.classList.add('todo-list__default');
      } 
    });
  });
}
