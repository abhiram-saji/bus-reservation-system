<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
    @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #0C4160;

    padding: 30px 10px;
}

.card {
    max-width: 500px;
    margin: auto;
    color: black;
    border-radius: 20 px;
}

p {
    margin: 0px;
}

.container .h8 {
    font-size: 30px;
    font-weight: 800;
    text-align: center;
}

.btn.btn-primary {
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;
    background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
    border: none;
    transition: 0.5s;
    background-size: 200% auto;

}


.btn.btn.btn-primary:hover {
    background-position: right center;
    color: #fff;
    text-decoration: none;
}



.btn.btn-primary:hover .fas.fa-arrow-right {
    transform: translate(15px);
    transition: transform 0.2s ease-in;
}

.form-control {
    color: white;
    background-color: #223C60;
    border: 2px solid transparent;
    height: 60px;
    padding-left: 20px;
    vertical-align: middle;
}

.form-control:focus {
    color: white;
    background-color: #0C4160;
    border: 2px solid #2d4dda;
    box-shadow: none;
}

.text {
    font-size: 14px;
    font-weight: 600;
}

::placeholder {
    font-size: 14px;
    font-weight: 600;
}
    </style><div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p>
        <div class="row gx-3">
            <!-- Person Name Validation -->
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Person Name</p>
                    <input class="form-control mb-3" type="text" placeholder="Name" 
                           pattern="[A-Za-z\s]+" title="Name should contain only letters and spaces" required>
                </div>
            </div>

            <!-- Card Number Validation -->
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Number</p>
                    <input class="form-control mb-3" type="text" placeholder="1234 5678 4356 7890" 
                           pattern="\d{4} \d{4} \d{4} \d{4}" title="Card number must be in the format: 1234 5678 9012 3456" required>
                </div>
            </div>

            <!-- Expiry Date Validation -->
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p>
                    <input class="form-control mb-3" type="text" placeholder="MM/YYYY" 
                           pattern="(0[1-9]|1[0-2])\/?([0-9]{4})" title="Expiry date should be in the format MM/YYYY" required>
                </div>
            </div>

            <!-- CVV/CVC Validation -->
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p>
                    <input class="form-control mb-3 pt-2" type="password" placeholder="***" 
                           pattern="\d{3}" title="CVV must be a 3-digit number" required>
                </div>
            </div>

            <!-- Pay Button -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-3">
                    <span class="ps-3">Pay</span>
                    <span class="fas fa-arrow-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>
