let progName;
let result = document.querySelector('.programm-data');
let prodsArray = document.querySelectorAll('.programs-list__item');
let activeDot = document.querySelectorAll('programs-list__item');

prodsArray.forEach((item) => {
    item.addEventListener('click', ()=> {
        progName = item.dataset.prog_name;
        let searchParams = new URLSearchParams();
        searchParams.set('progName', progName);

        let promise = fetch('server-processing/courceDataResponse.php', {
            method: 'POST',
            body: searchParams,
        });

        promise.then(
            response => {
                return response.text();
            }
        ).then(
            text => {
                result.innerHTML = text;
            }
        );

    });
});