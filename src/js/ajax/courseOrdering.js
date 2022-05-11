const initialState = document.querySelector('.courses__initial'),
  orderingState = document.querySelector('.courses__requesting'),
  succededState = document.querySelector('.courses__succeded'),
  startOrderBtn = document.querySelector('.courseOrderBtn'),
  cancelOrderBtn = document.querySelector('.cancelOrderBtn'),
  proceedOrderBtn = document.querySelector('.sendOrderBtn');

startOrderBtn.addEventListener('click', () => {
  initialState.classList.remove('courses__initial-visible');
  orderingState.classList.add('courses__requesting-visible');
});

cancelOrderBtn.addEventListener('click', () => {
  orderingState.classList.remove('courses__requesting-visible');
  initialState.classList.add('courses__initial-visible');
});
