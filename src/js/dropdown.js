function dropdownInitizaize() {
  const dropdowns = document.querySelectorAll('.dropdown'),
    dropdownOptions = document.querySelectorAll('.dropdown__option'),
    dropdownsValues =  document.querySelectorAll('.dropdown__btn-text'),
    dropdownLabels = document.querySelectorAll('.dropdown__label');
  
  const html = document.getElementsByTagName("html")[0];

  dropdowns.forEach((dropdown, index) => {
    if (html.classList.contains('dark')) {
      dropdown.classList.add('dropdown__dark');
    } else {
      dropdown.classList.remove('dropdown__dark');
    }

    dropdown.addEventListener('click', () => {
      openDropdown(dropdown);
    });
  });

  dropdownLabels.forEach((label, index) => {
    label.addEventListener('click', () => {
      let dropdownIndex = label.getAttribute('data-dropdownindex');
      let dropdown = document.querySelectorAll(`[data-index='` + dropdownIndex + `']`)[0];
      openDropdown(dropdown);
    });
  }); 

  function openDropdown(dropdown) {
    dropdown.classList.toggle('dropdown__active');
    const activeDropdowns = document.querySelectorAll(".dropdown__active");
    let activeOptions = dropdown.querySelectorAll('.dropdown__option');
    let activeOptionsContainer = dropdown.querySelector('.dropdown__options');

    if (activeDropdowns.length > 1) {
      let activeDropdownsCount = activeDropdowns.length - 1;

      for (let i = 0; i < activeDropdowns.length; i++) {
        activeDropdowns[activeDropdownsCount - i].style.zIndex = 10 + i;
      }
    }
    
    if (activeOptions.length > 3) {
      activeOptionsContainer.style.height = "160px";
    }
    
  }

  function dropdownValueTrimmer() {
    dropdownsValues.forEach((value) => {
      if (value.textContent.length > 22) {
        value.textContent = value.textContent.substr(0, 19) + '...';
      }
    })
  }

  dropdownValueTrimmer();

  dropdownOptions.forEach((option, index) => {
    option.addEventListener('click', () => {
      let currentDropdown = option.parentElement.parentElement.getAttribute("data-index");
      dropdownsValues[currentDropdown].textContent = option.textContent.trim();
      dropdownsValues[currentDropdown].setAttribute('dropdownvalue', option.textContent.trim());
      dropdownValueTrimmer();
    })
  });
}

dropdownInitizaize();
