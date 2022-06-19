function darkmodeInitialize() {
  const page = document.querySelector(".html"),
    darkmodeBtn = document.querySelector(".darkmode__checkbox"),
    darkmodeNtf = document.querySelector(".darkmode__ntf"),
    acceptBtn = document.querySelector(".darkmode__ntf-accept"),
    declineBtn = document.querySelector(".darkmode__ntf-decline");

  darkmodeBtn.addEventListener("change", () => {
    if (darkmodeBtn.checked) {
      page.classList.add("dark");
      setCookie("theme", "dark");
    } else {
      page.classList.remove("dark");
      setCookie("theme", "light");
    }
  });

  acceptBtn.addEventListener("click", () => {
    darkmodeNtf.style.display = "none";
    setCookie("isDarkmodeAccepted", "True");
  });

  declineBtn.addEventListener("click", () => {
    darkmodeNtf.style.display = "none";
    page.classList.remove("dark");
    setCookie("theme", "light");
    setCookie("isDarkmodeAccepted", "False");
    darkmodeBtn.checked = false;
  });

  if (getCookie("theme") == "dark") {
    page.classList.add("dark");
    setCookie("theme", "dark");
    darkmodeBtn.checked = true;
  } else {
    page.classList.remove("dark");
    setCookie("theme", "light");
  }

  if (getCookie("isDarkmodeAccepted") == "True") {
    darkmodeNtf.style.display = "none";
  } else if (getCookie("isDarkmodeAccepted") == "False" && getCookie("theme") == "dark") {
    darkmodeNtf.style.display = "block";
  }
}

darkmodeInitialize();
