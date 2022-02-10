let sender = document.getElementById('orders-sorting');
let sortResult = document.querySelector('.requests-wrapper');
let sortingMode = document.querySelectorAll('.select-sort__first-item');
let orderingMode = document.querySelectorAll('.select-order__item');


sender.addEventListener('submit', function(event) {
    
    let orderValue;
    let sortValue;

    for (let i = 0; i < sortingMode.length; i++) {
        if (sortingMode[i].selected == true) {
            sortValue = sortingMode[i].value;
        }
    }

    for (let i = 0; i < orderingMode.length; i++) {
        if (orderingMode[i].selected == true) {
            orderValue = orderingMode[i].value;
        }
    }

    let searchParams = new URLSearchParams();
    searchParams.set('sortingMode', sortValue);
    searchParams.set('orderingMode', orderValue);

    let promise = fetch('../server-processing/ordersSortHandler.php', {
        method: 'POST',
        body: searchParams,
    });

    promise.then(
        response => {
            return response.text();
        }
    ).then(
        text => {
            sortResult.innerHTML = text;
        }
    );

    event.preventDefault();

});