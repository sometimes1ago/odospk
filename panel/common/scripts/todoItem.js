todoListInit();
function todoListInit() {
  let listItems = document.querySelectorAll('.todo-list__item');
  let asideMenu = document.querySelector(".todo-actions");
  let todoList = document.querySelector('.todo-item__notes__full');

  listItems.forEach( (item,i) => {
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































/* let todoItems = document.querySelectorAll(".todo-list__item");
let todoListCont = document.querySelector(".todo-item__notes__full");
let todoActions = document.querySelector(".todo-actions");
let itemsArr = [];  */

/* //ЖАБА СКРИПТ ХУЕТА
//Переборка элементов
todoItems.forEach((item) => {
  //Даем слушатель
  item.addEventListener("click", function handler() {
    //Записываем выделенные элементы в массив
    itemsArr.push(item);
    //Делаем его выделенным
    item.classList.add("todo-list__item-selected");
    //Удаляем листенер у выделенного элемента
    this.removeEventListener('click', handler);
    //Если у нас есть выделенные элементы, показываем меню
    if (itemsArr.length > 0) {
      todoListCont.classList.add("todo-item__notes");
      todoActions.classList.add("todo-actions__visible");
      //Перебираем выделенные элементы
      for (let i = 0; i < itemsArr.length; i++) {
        //Даем им листенер
        itemsArr[i].addEventListener('click', (item) => {
          //Убираем выделение
          item.classList.remove("todo-list__item-selected");
          //Удаляем из массива выделенных
          itemsArr.splice(item, 1);
        });
      }
      //Если ничо не выделено, то убираем меню
    } else {
      todoListCont.classList.remove("todo-item__notes");
      todoActions.classList.remove("todo-actions__visible");
    }
  }, true);
}); */

