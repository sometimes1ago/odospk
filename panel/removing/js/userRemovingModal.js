deleteModalInit();
function deleteModalInit() {
  const modalOpen = document.querySelector(".user-deleting__sender"),
    modalCancel = document.querySelector(".modal-user__closer"),
    modalConfirm = document.querySelector(".modal-user__sender"),
    modalWrap = document.querySelector(".modal"),
    deleteForm = document.querySelector(".deleting-user"),
    userName = document.querySelector("#userSelectorValue"),
    selectopOptions = document.querySelectorAll("#user-selector__value"),
    userModal = document.querySelector('.modal-user'),
    programModal = document.querySelector('.modal-program');
  let selectorCurrent = userName.dataset.username;
  deleteForm.addEventListener("submit", function (e) {
    e.preventDefault();
  });
  modalOpen.addEventListener("click", showModal);
  modalCancel.addEventListener("click", closeModal);
  modalConfirm.addEventListener("click", closeModal);
  selectopOptions.forEach((selector) => {
    selector.addEventListener("click", function () {
      let clickUser = selector.querySelector(".selector__options_value");
      selectorCurrent = clickUser.dataset.username;
      userName.dataset.username = selectorCurrent;
    });
  });
  function closeModal() {
    modalWrap.style.display = "none";
    userModal.style.display = "none";
  }
  function showModal(e) {
    programModal.style.display = "none";
    modalWrap.style.display = "flex";
    userModal.style.display = "block";
    let modalUsername = document.querySelector(".modal-user__description");
    modalUsername.innerHTML = selectorCurrent;
  }
}