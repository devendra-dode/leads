<div class="premium-section">
  <div class="container mt-5 premium-section">
    <h2 class="text-center mb-5 fs-1 fw-bold"><span class="text-dark">EMI </span><span
        class="">Calculator</span>
    </h2>
    <div class="row gx-5 mt-5">
      <div class="col-lg-7">
        <div class="slider-section mt-4">
          <div class="slider-container">
            <div class="d-flex justify-content-between">
              <label for="loanAmount" class="fs-5">Loan Amount (₹)</label>
              <input type="number" class="form-control mb-2 w-25 text-center" id="loanAmountDisplay" value="500000">
            </div>
            <input type="range" class="form-range" id="loanAmount" min="10000" max="50000000" step="10000"
              value="500000">
            <div class="slider-values">
              <span class="fs-5">₹10,000</span>
              <span class="fs-5">₹5,00,00,000</span>
            </div>
          </div>

          <div class="slider-container">
            <div class="d-flex justify-content-between">
              <label for="loanTenure" class="fs-5">Loan Tenure (Years)</label>
              <input type="number" class="form-control mb-2 w-25 text-center" id="loanTenureDisplay" value="3">
            </div>
            <input type="range" class="form-range" id="loanTenure" min="1" max="35" step="1" value="3">
            <div class="slider-values">
              <span class="fs-5">1 Yr</span>
              <span class="fs-5">35 Yrs</span>
            </div>
          </div>

          <div class="slider-container">
            <div class="d-flex justify-content-between">
              <label for="interestRate" class="fs-5">Rate of Interest (%)</label>
              <input type="number" class="form-control mb-2 w-25 text-center" id="interestRateDisplay" value="12.5">
            </div>
            <input type="range" class="form-range" id="interestRate" min="5" max="25" step="0.1" value="12.5">
            <div class="slider-values">
              <span class="fs-5">5%</span>
              <span class="fs-5">25%</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="result-section">
          <p class="fs-5">Monthly Payment (EMI): <strong id="monthlyEMI">₹16726.81</strong></p>
          <p class="fs-5">Total Interest Payable: <strong id="totalInterest">₹102165.26</strong></p>
          <p class="fs-5">Total Payment: <strong id="totalPayment">₹602165.26</strong></p>
          <div class="chart-container">
            <canvas id="emiChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>