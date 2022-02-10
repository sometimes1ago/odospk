let changer = document.querySelectorAll('.order-status');
let status;
let ordID;

changer.forEach((item) => {
    item.addEventListener('click', () => {
        
        if (item.textContent == "Не обработан") {
            status = item.textContent = "Обработан";
            
        } else {
            status = item.textContent = "Не обработан";
        }

        ordID = item.dataset.id;
        console.log(ordID);
        let searchParams = new URLSearchParams();
        searchParams.set('status', status);
        searchParams.set('ordID', ordID);

        let promise = fetch('../server-processing/orderStatusHandler.php', {
            method: 'POST',
            body: searchParams,
        });
        
    });
});