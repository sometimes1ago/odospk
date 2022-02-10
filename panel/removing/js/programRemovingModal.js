/* deleteModalInit();
function deleteModalInit() {
  const modalOpen = document.querySelector(".program-deleting__sender"),
    modalCancel = document.querySelector(".modal-program__closer"),
    modalConfirm = document.querySelector(".modal-program__sender"),
    modalWrap = document.querySelector(".modal"),
    deleteForm = document.querySelector(".deleting-form"),
    programmName = document.querySelector("#programSelectorValue"),
    selectopOptions = document.querySelectorAll("#selector-program__value"),
    programModal = document.querySelector('.modal-program'),
    userModal = document.querySelector('.modal-user');
  let selectorCurrent = programmName.dataset.programname;
  deleteForm.addEventListener("submit", function (e) {
    e.preventDefault();
  });
  modalOpen.addEventListener("click", showModal);
  modalCancel.addEventListener("click", closeModal);
  modalConfirm.addEventListener("click", closeModal);
  selectopOptions.forEach((selector) => {
    selector.addEventListener("click", function () {
      let clickProgram = selector.querySelector(".selector__options_value");
      selectorCurrent = clickProgram.dataset.programname;
      programmName.dataset.programname = selectorCurrent;
      console.log(clickProgram);
    });
  });
  function closeModal() {
    modalWrap.style.display = "none";
    programModal.style.display = "none";
  }
  function showModal(e) {
    userModal.style.display = "none";
    modalWrap.style.display = "flex";
    programModal.style.display = "block";
    let modalProgramm = document.querySelector(".modal-program__description");
    modalProgramm.innerHTML = selectorCurrent;
  }
}
 */
deleteModalInit();
function deleteModalInit() {
    const modalOpen = document.querySelector('.program-deleting__sender'),
          modalCancel = document.querySelector('.modal-program__closer'),
          modalConfirm = document.querySelector('.modal-program__sender'),
          modalWrap = document.querySelector('.modal'),
          deleteForm = document.querySelector('.deleting-form'),
          programmName = document.querySelector('#programSelectorValue'),
          selectopOptions = document.querySelectorAll('#selector__options_value');
    let selectorCurrent = programmName.dataset.programname;
    deleteForm.addEventListener('submit', function (e) {
        e.preventDefault();
    })
    modalOpen.addEventListener('click', showModal);
    modalCancel.addEventListener('click', closeModal)
    modalConfirm.addEventListener('click', closeModal)
    selectopOptions.forEach((selector)=> {
        selector.addEventListener('click', function () {
            let clickProgram = selector.querySelector('.selector__options_value');
            selectorCurrent = clickProgram.dataset.programname;
            programmName.dataset.programname = selectorCurrent;
        })
    })
    function closeModal() {
        modalWrap.style.display = 'none';
    }
    function showModal(e) {
        modalWrap.style.display = 'flex';
        let modalProgramm = document.querySelector('.modal-program__description');
        modalProgramm.innerHTML = selectorCurrent;  
        
    }
}
