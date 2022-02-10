let searchSender = document.getElementById('form-find-submit__second');
let searchResult = document.querySelector('.requests-wrapper');
let searchBy = document.querySelectorAll('.select-sort__item');

searchSender.addEventListener('submit', function(event) {
    
    let searchByItem;
    let searchValue = document.querySelector('.input-value').value;
    console.log(searchValue);
    for (let i = 0; i < searchBy.length; i++) {
        if (searchBy[i].selected == true) {
            searchByItem = searchBy[i].value;
        }
    }

    let searchParams = new URLSearchParams();
    searchParams.set('searchByItem', searchByItem);
    searchParams.set('searchValue', searchValue);

    let promise = fetch('../server-processing/directSearchHandler.php', {
        method: 'POST',
        body: searchParams,
    });

    promise.then(
        response => {
            return response.text();
        }
    ).then(
        text => {
            searchResult.innerHTML = text;
        }
    );

    event.preventDefault();
});