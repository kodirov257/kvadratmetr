<h1 class="page-title text-align-left mb-4">Payment Calculator</h1>
<div class="characteristic-panel mb-4">
    <div class="row">
        <div class="col-6 mb-4">
            <label class="appart-label" for="apart-price">Apartment Price</label>
            <input type="text" id="apart-price" class="apart-input" placeholder="720 000 000 sum">
            <label class="appart-label" for="down-payment">Down Payment</label>
            <div class="characteristic-panel mb-4 min-h-bg p-0">
                <input type="text" class="down-input" placeholder="216 000 000 sum">
                <input type="text" class="down-input-sec" placeholder="30%">
            </div>
            <a href="#" class="hide-options">Hide Advanced Options <i class="icon-up"></i></a>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    <label class="appart-label">Length of Loan</label>
                    <button class="characteristic-panel btn char-btn p-2 min-h-bg"><span>10 Years</span><i class="icon-down"></i></button>
                </div>
                <div class="col-6">
                    <label class="appart-label">Interest rate</label>
                    <button class="characteristic-panel btn char-btn p-2 min-h-bg"><span>22 %</span><i class="icon-down"></i></button>
                </div>
            </div>
            <label class="appart-label">Monthly payment</label>
            <h1 class="monthly-summ">10 891 588 <span>sum</span></h1>
        </div>
    </div>

    <div class="second-panel">
        <label class="second-panel-title">Payment Breakdown</label>
        <div class="row">
            <div class="col-6 pos-rel">
                <div id="chartContainer" class="char-chart"></div>
                <div class="chart-summ-div">
                    <label class="appart-label mini">Monthly payment</label>
                    <p class="chart-summ">10 891 588</p>
                </div>
            </div>
            <div class="col-6">
                <p class="chart-title">How is your monthly payment calculated?</p>
                <div class="chart-item">
                    <span class="price-summa"><img src="./assets/img/dark-blue-rec.jpg" alt="dark-blue-rec"> Principal & interest</span>
                    <span class="price-summa">10 417 522</span>
                </div>
                <div class="chart-item">
                    <span class="price-summa"><img src="./assets/img/red-rec.jpg" alt="dark-blue-rec"> Property TAX</span>
                    <span class="price-summa">+ 474 000</span>
                </div>
                <div class="chart-item">
                    <span class="price-summa"><img src="./assets/img/blue-rec.jpg" alt="dark-blue-rec"> Other TAX</span>
                    <span class="price-summa">+ 66</span>
                </div>
                <div class="chart-total-summa">
                    <span class="total-title">Total monthly payment</span>
                    <span class="total-summa">10 891 588</span>
                </div>
            </div>
        </div>
    </div>
</div>