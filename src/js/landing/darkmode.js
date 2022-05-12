function darkmodeInitialize() {
  const page = document.querySelector('.html'),
    darkmodeBtn = document.querySelector('.darkmode__checkbox'),
    darkmodeNtf = document.querySelector('.darkmode__ntf'),
    acceptBtn = document.querySelector('.darkmode__ntf-accept'),
    declineBtn = document.querySelector('.darkmode__ntf-decline');
  
  darkmodeBtn.addEventListener('change', () => {
    if (darkmodeBtn.checked) {
      page.classList.add('dark');
      localStorage.setItem('theme', 'dark');
    } else { 
      page.classList.remove('dark');
      localStorage.setItem('theme', 'light');
    }
  });

  acceptBtn.addEventListener('click', () => {
    darkmodeNtf.style.display = 'none';
    localStorage.setItem('isDarkmodeAccepted', 'True');
  });

  declineBtn.addEventListener('click', () => {
    darkmodeNtf.style.display = 'none';
    page.classList.remove('dark');
    localStorage.setItem('theme', 'light');
    darkmodeBtn.checked = false;
  });

  if (localStorage.getItem('theme') == 'dark') {
    page.classList.add('dark');
    localStorage.setItem('theme', 'dark');
    darkmodeBtn.checked = true;
  } else {
    page.classList.remove('dark');
    localStorage.setItem('theme', 'light');
  }

  if (localStorage.getItem('isDarkmodeAccepted') == 'True') {
    darkmodeNtf.style.display = 'none';
  }
}

darkmodeInitialize();