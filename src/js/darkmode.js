function darkmodeInitialize() {
  const ntfContainer = document.querySelector('.darkmode__ntf');
  const thxBtn = document.querySelector('.darkmode__ntf-thanks');
  const btn = document.querySelector(".enable-darkmode__btn");
  const html = document.querySelector('.html');
  const currentTime = new Date().getHours();
  const currentTheme = localStorage.getItem("theme");
  
  if (currentTheme == "dark") {
    html.classList.add("dark");
  }

  if (localStorage.getItem("theme") == "light") {
    if (currentTime >= 20 || currentTime <= 8) {
      localStorage.setItem("theme", "dark");
    }
  }

  thxBtn.addEventListener('click', () => {
    ntfContainer.style.display = 'none';
  });

  btn.addEventListener("click", function() {
    html.classList.toggle("dark");
    
    if (html.classList.contains("dark")) {
      theme = "dark";
    }
    localStorage.setItem("theme", theme);
  });
}

darkmodeInitialize();