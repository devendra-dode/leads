<?= $this->extend('web/templates/main') ?>

<?= $this->section('content') ?>

  <div style="" id="contact-us">
    <div class="container mt-5">
      <div class="contact-container p-4">
        <h2 class="text-center mb-5 fs-1"><strong>Apply <span>Loan</span></strong></h2>
        <div class="row g-4 mt-5 mb-5">
          <div class="col-lg-6 col-md-12 contact-info">

               <img src="<?= base_url('/public/uploads/loan-type-new.png') ?>" class="img-fluid" alt="Financial Products" style="max-height: 400px;">

          </div>
          <div class="col-lg-6 col-md-12 contact-form">

			<form id="applyLoanForm" novalidate>
			  <div class="row g-3">

			  	<div class="col-md-12">
				  <div class="loan-type-selector">

						<?php foreach ($services as $service): ?>
	                      <?php if ($service['type'] === 'Loan'): ?>

						  <input type="radio" name="loan_type" id="<?= esc($service['slug']) ?>" value="<?= esc($service['name']) ?>" class="loan-type-input">
						  <label for="<?= esc($service['slug']) ?>" class="loan-type-label loan-type-<?= esc($service['name']) ?>">
						    <span><i class="<?= esc($service['icon']) ?>"></i></span> <?= esc($service['name']) ?>
						  </label>

						 <?php endif; ?>
	                   <?php endforeach; ?>

					</div>

					  <div class="invalid-feedback">
					    Please select a loan type.
					  </div>
			  	</div>
			  	<div class="col-md-12">
			      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
			      <div class="invalid-feedback">Please enter a name.</div>
			    </div>

			    <div class="col-md-12">
			      <input type="text" class="form-control mobile-number" id="contact" name="contact" placeholder="Contact Number">
			      <div class="invalid-feedback">Enter a valid 10-digit mobile number.</div>
			    </div>
			  </div>

			  <input type="hidden" name="loan_recaptcha_token" id="loan_recaptcha_token">

			  <div class="text-end mt-3">
			    <button type="submit" class="btn btn-custom rainbow">Apply Now!</button>
			  </div>
			</form>


          </div>
        </div>
      </div>
    </div>
  </div>

<!-- =========================== calculator =============================== -->

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

<div class="py-5 mt-5">
    <?= html_entity_decode($service['details'], ENT_NOQUOTES, 'UTF-8') ?>
</div>


<?= $this->endSection() ?>
