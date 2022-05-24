let actionsContainer = document.querySelector('.queries__actions');
let cb = document.querySelectorAll(".query__checkbox");
cb.forEach((cb) =>
  cb.addEventListener("change", (e) => {
    updateCb(cb);
  })
);

function updateCb(cb) {
  cb.classList.toggle("query__checkbox-active");
  let cbActive = document.querySelectorAll(".query__checkbox-active");
  actionsContainer.classList.toggle('queries__actions-visible');
  
  if (cbActive.length > 1) {
    cb.checked = false;
    actionsContainer.classList.toggle('queries__actions-visible');
    cb.classList.remove("query__checkbox-active");
  }
}
