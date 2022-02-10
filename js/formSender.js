let sender = document.getElementById('modal-course__form');
let innerResult = document.querySelector('.request-response');

sender.addEventListener('submit', function(event) { 
    let firstname = document.querySelector('.modal-firstname').value;
    let span = document.querySelector('.coursename').textContent;
    let lastname = document.querySelector('.modal-secondname').value;
    let phone = document.querySelector('.modal-phone').value;
    let email = document.querySelector('.modal-mail').value;

    let searchParams = new URLSearchParams();
    searchParams.set('coursename', span);
    searchParams.set('firstname', firstname);
    searchParams.set('lastname', lastname);
    searchParams.set('phone', phone);
    searchParams.set('email', email);

    let promise = fetch('server-processing/formHandler.php', {
        method: 'POST',
        body: searchParams,
    });

    promise.then(
        response => {
            return response.text();
        }
    ).then(
        text => {
            innerResult.innerHTML = text;
        }
    );

    event.preventDefault();
});