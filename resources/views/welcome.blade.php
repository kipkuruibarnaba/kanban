<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Ready</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <br>
        <example-component></example-component>
    </div>

    <div class="text-center mt-4">
        <label class="p-1 costum-class">Made By <strong>Barnkip</strong>.</label>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        let columnNumber = 0;
        let cardNumber = 0;
        // let data = [];
        window.onload = function() {
            axios.post('/load_items')
                .then((response) => {
                    let data = response.data
                    // console.log(data);
                    data.forEach(ele => {
                        const btnAddComlumn = document.querySelector('#btn-add-column');
                        const columnMovements = document.querySelector('#column-movements');
                        const html = `<div class="col-sm">
                            <div class="card" style="background-color:F4D9E7;">
                                <input type="hidden" name="columnno" class="columnno" id="columnno" value= ${ele.id}/>
    
                                <div class="card-body">
                                    <h5 class="card-title" id="total-count" >Column ${ele.id}</h5>
                                
                                    <button
                            type="button"
                            id="btn-remove-columns"
                            class="btn btn-sm btn-danger"
                            value= ${ele.id}
                        >
                           X
                        </button>
                        <div id ="card-movements-${ele.id}"></div>
                        <button
                            type="button"
                            id="btn-add-card"
                            value= ${ele.id}
                            class="btn btn-sm btn-primary mt-2"
                        >

                            Add Card
                             </button>
                        </div>`;
                        columnMovements.insertAdjacentHTML('afterbegin', html);

                        const btnAddCard = document.querySelector('#btn-add-card');
                        btnAddCard.addEventListener('click', function(e) {
                            let cardVal = cardNumber++
                            const wrapper = e.target.closest(".card");
                            const columnID = parseInt(wrapper.querySelector(".columnno")
                                .value);
                            handlerToSaveCard(columnID)
                        });
                        if (ele.carddes) {
                            renderCards(ele.carddes)
                        }

                    });

                })
                .catch((error) => {
                    console.log(error);
                })
        }

        const btnAddComlumn = document.querySelector('#btn-add-column');
        btnAddComlumn.addEventListener('click', function(e) {
            e.preventDefault();
            axios.post('/add_column_url')
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                })
            location.reload();
        });

        function handlerToSaveCard(columnid) {
            // console.log(columnid)
            const requestBody = {
                columnid: columnid
            }
            axios.post('/add_card_url', requestBody)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                })
            location.reload();
        }


        function renderCards(cardes) {

            cardes.forEach(ele => {
                let col = ele.column_id
                let card = ele.id
                const cardMovements = document.querySelector(`#card-movements-${col}`);
                if (cardMovements) {
                    const html = `
                        <div class="card mt-1 mb-1" id="modaldisplay" style="background-color:E5E5CB;">
                            <div class="card-body">
                                <h5 class="card-title text-info" id="card-count-${card}" >Card ${card}</h5>
                                <input type="hidden" name="cardtitle" class="cardtitle" id="cardtitle" value= ${card}/>
                                <p class="card-text d-none" id="toggleshow-${card}">The card which is being displayed belongs to column number ${col} and is card number ${card} .</p>
                                <input type="hidden" name="carddes" class="carddes" id="carddes" value= "The card which is being displayed belongs to column number ${col} and is card number ${card} "/>
                            </div>
                        </div>
                             `
                    cardMovements.insertAdjacentHTML('beforeend', html);

    const btnShowCard = document.querySelector(`#card-count-${card}`);
    // console.log(btnShowCard)
    btnShowCard.addEventListener('click', function(e) {
        // console.log('hello');
            e.preventDefault();
            const btnCard = document.querySelector(`#toggleshow-${card}`)
            // console.log(btnCard)
            // btnShowCard.classList.remove('d-none')
            btnCard.classList.toggle('d-none');
            // document.querySelector('#toggleshow').toggleClass("d-none");
            // document.querySelector('#toggleshow').toggleClass( 'className', 'd-none' );
        });
                }
            });


    const btnRemoveColumn = document.querySelector('#btn-remove-columns');
    btnRemoveColumn.addEventListener('click', function(e) {
    e.preventDefault();
    const requestBody = {
                columnid: btnRemoveColumn.value
            }
            axios.delete('/remove_column_url/'+ btnRemoveColumn.value)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                })
            location.reload();

        });

        };




    </script>
</body>

</html>

