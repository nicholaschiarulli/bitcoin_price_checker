<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bitcoin Price</title>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="card">
                <h2>Bitcoin Price</h2>
                <div class="select-container">
                    <select id="currencySelect">
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                    </select>
                </div>
                <div class="price-container">
                    <span id="btcPrice">{{$btcValue}}</span>
                    <span id="currencyValue">USD</span>
                </div>
            </div>
        </div>

    </body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currencySelect = document.getElementById('currencySelect');

        currencySelect.addEventListener('change', function () {
            const selectedCurrency = currencySelect.value;

            axios.get(`/btc-price?Currency=${selectedCurrency}`)
                .then(response => {
                    updateBtcPrice(response.data, selectedCurrency);
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });

    function updateBtcPrice(newPrice, selectedCurrency) {
        const btcPrice = document.getElementById('btcPrice');
        btcPrice.textContent = newPrice;
        const currencyValue = document.getElementById('currencyValue');
        currencyValue.textContent = selectedCurrency;
    }

</script>

<style>
body {
    background-color: #f3f4f6;
    font-family: Arial;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.card {
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

h2 {
    font-size: 24px;
    font-weight: bold;
    margin: 0 0 10px;
}

#btcPrice {
    font-size: 32px;
    font-weight: bold;
    color: #f1b329;
    display: inline-block;
    margin-right: 5px;
}

.price-container {
    display: inline-block;
}

#currencyValue {
    font-size: 22px;
    font-weight: bold;
    color: #777;
    display: inline-block;
}

.select-container {
    position: relative;
    display: inline-block;
    width: 150px;
    margin-right: 5px;
}

#currencySelect {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
}

.select-container::before {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}
</style>
