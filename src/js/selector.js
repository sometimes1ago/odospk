selectsInit();
function selectsInit() {
  const selects = document.querySelectorAll(".selector__select-wrap"),
    dropDowns = document.querySelectorAll(".selector__options"),
    dropDownsItems = document.querySelectorAll(".selector__options_item"),
    selectedItem = document.querySelectorAll(".selector__value"),
    selectorItems = document.querySelectorAll(".selector__item");
  selects.forEach((select, i) => {
    select.addEventListener("click", function () {
      selectOpen(i);
    });
  });

  function selectOpen(select) {
    dropDowns[select].classList.toggle("selector__options-active");
    selectorItems[select].classList.toggle("selector__item-active");
    const selects = document.querySelectorAll(".selector__item-active");

    if (selects.length > 1) {
      let selectsLength = selects.length - 1;

      for (let i = 0; i < selects.length; i++) {
        selects[selectsLength - i].style.zIndex = 1 + i;
      }
    }

    if (dropDowns[select].childElementCount > 2) {
      dropDowns[select].style.height = "165px";
    }
    setTimeout(function () {
      dropDowns[select].style.opacity = 1;
    }, 100);
  }

  /**
   * Method usable for checking onload page event selector value lenght for overfilling
   */
  function SelectorValueLenChecker() {
    for (i = 0; i < selectedItem.length; i++) {
      if (selectedItem[i].textContent.length > 22) {
        selectedItem[i].textContent =
          selectedItem[i].textContent.substr(0, 19) + "...";
      }
    }
  }

  SelectorValueLenChecker();
  
  dropDownsItems.forEach((item, i) => {
    item.addEventListener("click", function () {
      let indexItem =
        item.parentElement.parentElement.getAttribute("data-index");
      selectedItem[indexItem].textContent = item.textContent.trim();
      SelectorValueLenChecker();
    });
  });
}
