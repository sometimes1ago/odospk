todoListInit();
function todoListInit() {
  let listItems = document.querySelectorAll('.todo-list__item');
  let asideMenu = document.querySelector(".todo-actions");
  let todoList = document.querySelector('.todo-item__notes__full');

  listItems.forEach((item) => {
    item.addEventListener('click', () => {
      item.classList.toggle('todo-list__item-selected');

      let activeItems = document.querySelectorAll('.todo-list__item-selected');
      todoList.classList.remove('todo-item__notes__full');

      let elems = updateArray(); 
      function updateArray () {
        let elements = [];
        activeItems.forEach(item  => elements.push(item.textContent));
        return elements;
      }

      asideMenu.classList.add('todo-actions__visible');
      todoList.classList.add('todo-item__notes');
      
      if (activeItems.length == 0) {
        asideMenu.classList.remove('todo-actions__visible');
        todoList.classList.add('todo-item__notes__full');
      } 
    });
  });
}
