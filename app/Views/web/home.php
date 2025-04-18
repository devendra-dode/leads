<?= $this->extend('web/templates/main') ?>

<?= $this->section('content') ?>


  <!-- /* ======================= hero =================================== */ -->
  <!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center py-5 mt-5">
  <div class="container position-relative">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true" data-bs-pause="false">

      <!-- Dynamic Carousel Indicators -->
      <div class="carousel-indicators">
        <?php 
          $homeBanners = array_values(array_filter($services, function($s) {
            return $s['type'] === 'HomeBanner';
          }));
          foreach ($homeBanners as $index => $service): 
        ?>
          <button type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="<?= $index ?>"
            class="<?= $index === 0 ? 'active' : '' ?>"
            aria-current="<?= $index === 0 ? 'true' : 'false' ?>"
            aria-label="Slide <?= $index + 1 ?>"></button>
        <?php endforeach; ?>
      </div>

      <!-- Dynamic Carousel Items -->
      <div class="carousel-inner pb-4">
        <?php foreach ($homeBanners as $index => $service): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="3000">
            <div class="row align-items-center">
              
              <?= ($service['short_description']) ?>
          
              <div class="col-lg-4 text-end">
                <img class="img-fluid p-1" src="<?= esc($service['icon']) ?>" alt="">
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

  <!-- End Hero -->
  <!-- /* ======================= hero =================================== */ -->

  <div class="marquee mt-1 mb-5">
    <ul class="marquee__content">

       <?php foreach ($services as $service): ?>
          <?php if ($service['type'] === 'HomeTextSlider'): ?>
              <li>
                  <i class="far fa-dot-circle fs-5"></i>
                  <?= esc($service['name']) ?>
              </li>
          <?php endif; ?>
      <?php endforeach; ?>

    </ul>
  </div>

  <!-- /* ======================= hero2 =================================== */ -->
  <section id="services" class="py-5 pl-5" style="padding-left: 10px; background-color: #ebf1ff;">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left Column - Content -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="display-5 fw-bold mb-4 size">
            Bringing you the <span style="color: #1b1dc7;">Best Products</span> from Top Banks & Financial Institutions
          </h2>

          <div class="row g-4">
              <?php foreach ($services as $service): ?>
                  <?php if ($service['type'] === 'Loan'): ?>
                    <div class="col-6 col-md-4">
                      <a href="<?= base_url('service/' . esc($service['slug'])) ?>" class="text-decoration-none">
                        <div class="p-3 rounded h-100 product-card bg-primary text-white">
                          <i class="<?= esc($service['icon']) ?> fa-2x mb-3"></i>
                          <h5 class="mb-0 fs-5"> <?= esc($service['name']) ?></h5>
                        </div>
                      </a>
                    </div>
                 <?php endif; ?>
              <?php endforeach; ?>
          </div>
        </div>

        <!-- Right Column - GIF Image -->
        <div class="col-lg-6 text-center">
          <img src="<?= base_url('/public/uploads/loan-type-new.png') ?>" class="img-fluid" alt="Financial Products" style="max-height: 400px;">
        </div>
      </div>
    </div>
  </section>
  <!-- /* ======================= hero =================================== */ -->


  <style>
    @media (max-width: 767.98px) {
      #stepImage {
        max-height: 300px;
      }
    }
  </style>
  <!-- loan=============== -->

<!-- why choose us -->

<div class="container my-5">
      <div class="mb-4">
      <h2 class="text-center font-weight-bold h1 fw-bold">Get Loan in 3 Easy Steps</h2>
      <p class="text-center text-secondary fs-5">Just 2 minutes to get started</p>
    </div>

  <div class="row justify-content-center g-4">

    <div class="col-md-4 d-flex">
      <div class="illustrated-card w-100">
        <img width="160" src="<?= base_url('/public/uploads/fill-form.png') ?>">
        <h3><span style="color:#026AA2">Step 1: Apply for Loan</span></h3>
        <p>Provide your basic details and documents. It’s quick and paperless!</p>
      </div>
    </div>
    <div class="col-md-4 d-flex">
      <div class="illustrated-card w-100">
        <img width="160" src="<?= base_url('/public/uploads/approval.png') ?>">
        <h3><span style="color:#026AA2">Step 2: Get Instant Approval</span></h3>
        <p>Your loan application is reviewed instantly. No collateral needed.</p>
      </div>
    </div>
        <div class="col-md-4 d-flex">
      <div class="illustrated-card w-100">
        <img width="160" src="<?= base_url('/public/uploads/money-in-hand.svg') ?>" alt="Money in hand illustration">
        <h3><span style="color:#026AA2">Step 3: Receive Funds</span></h3>
        <p>Approved? Your loan is disbursed directly into your bank account.</p>
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


<section class="my-5" id="about-us">

    <div class="mb-4">
        <h2 class="text-center font-weight-bold h1 fw-bold"></h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-5 col-12 text-center d-flex align-items-center">
              <img src="<?= base_url('/public/uploads/about-us.png') ?>" class="img-fluid" alt="Financial Products" style="max-height: 400px;">

            </div>
            <div class="col-lg-7 col-md-12 mx-auto col-sm-7 col-12 text-lg-start text-center">
              <?php foreach ($services as $service): ?>
                  <?php if ($service['slug'] === 'about-us'): ?>
                        <?= ($service['short_description']) ?>
                  <?php endif; ?>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="my-5 py-5 bg-light">
  <div class="mb-4">
    <h2 class="text-center font-weight-bold h1 fw-bold">Why with Us</h2>
  </div>

  <div class="container">
    <div class="row align-items-center justify-content-between">
      
      <!-- Left Text Column -->
      <div class="col-lg-5 mb-4 mb-lg-0">
        <h2>Why Choose PaisaClick Finance?</h2>
        <p>
          For over 15 years, PaisaClick Finance has been delivering smart and reliable loan solutions tailored to your needs. From personal and business loans to home and education financing, we’re committed to providing fast, transparent, and affordable lending options for every stage of life.
        </p>
        <p>
          Backed by trust, technology, and a customer-first approach, PaisaClick is your one-stop destination for hassle-free loans with minimal documentation and quick disbursal.
        </p>
      </div>


      <!-- Right Cards Column -->
      <div class="col-lg-6">
        <div class="row g-3">
          
          <!-- Card 1: Lowest Interest Rates -->
          <div class="col-12">
            <div class="card h-100 shadow-sm product-card">
              <div class="card-body d-flex align-items-start">
                <div class="me-3">
                  <i class="fas fa-percentage fa-2x text-primary"></i>
                </div>
                <div>
                  <h5 class="card-title mb-1 text-light">Lowest Interest Rates</h5>
                  <p class="card-text text-light">
                    We offer loans at competitive interest rates to ease your financial burden.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2: Minimum Documentation -->
          <div class="col-12">
            <div class="card h-100 shadow-sm product-card">
              <div class="card-body d-flex align-items-start">
                <div class="me-3">
                  <i class="fas fa-file-alt fa-2x text-success"></i>
                </div>
                <div>
                  <h5 class="card-title mb-1 text-light">Minimum Documentation</h5>
                  <p class="card-text text-light">
                    Say goodbye to long paperwork! Apply with just a few essential documents.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 3: Quick Disbursal -->
          <div class="col-12">
            <div class="card h-100 shadow-sm product-card">
              <div class="card-body d-flex align-items-start">
                <div class="me-3">
                  <i class="fas fa-bolt fa-2x text-warning"></i>
                </div>
                <div>
                  <h5 class="card-title mb-1 text-light">Quick Disbursal</h5>
                  <p class="card-text text-light">
                    Get funds in your account within hours of approval—no waiting, no hassle.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- /row -->
      </div> <!-- /col -->
    </div> <!-- /row -->
  </div> <!-- /container -->
</section>

  <!-- =========================== performance =============================== -->

  <div class="bg-dark-blue-white w-100 py-5">
    <div class="container text-center">
      <div class="mx-auto bg-primary mb-4 rounded" style="width: 50px; height: 5px;"></div>
      <p class="text-uppercase text-secondary fs-5 fw-bold">Company Stats</p>
      <h2 class="fw-bold fs-1">Our Performance</h2>
      <div class="row mt-4">
        <div class="col-md-3 py-3">
          <h3 class="fw-bold fs-1">11000+</h3>
          <p class="text-secondary fs-5">Pincode Serviceable</p>
        </div>
        <div class="col-md-3 py-3">
          <h3 class="fw-bold fs-1">6900+</h3>
          <p class="text-secondary fs-5">DSA Partners</p>
        </div>
        <div class="col-md-3 py-3">
          <h3 class="fw-bold fs-1">455000+</h3>
          <p class="text-secondary fs-5">Satisfied Customers</p>
        </div>
        <div class="col-md-3 py-3">
          <h3 class="fw-bold fs-1">1250 Cr</h3>
          <p class="text-secondary fs-5">Loan Disbursed</p>
        </div>
      </div>
    </div>
  </div>


  <!-- ==================== calculator ==================== -->

  <!-- =================testimonial============================= -->
  <section class="testimonial-section">
    <div class="container">
      <h1 class="text-center fs-1 fw-bold mb-5 mt-5">Testimonial</h1>
      <div class="marquee-container">
        <div class="marquee-content marquee-right">
          <div class="testimonial-card">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
              Purchased a Laptop for my business. It's very easy and for urgent short of
              cash
              PaisaClick has given always financial backup for me. We are using it for a very long time.
            </p>
            <div class="testimonial-author-info">
              <div>
                <h5 class="testimonial-author">Anjali Kumari</h5>
                <p class="testimonial-role">Age - 26</p>
              </div>
              <img src="images/anjali.avif" alt="John Doe" class="testimonial-img">
            </div>
          </div>

          <div class="testimonial-card">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
              It's the simplest way to get money without any hidden charges. It's very
              easy. I
              booked a car for myself using XpressLoan.
            </p>
            <div class="testimonial-author-info">
              <div>
                <h5 class="testimonial-author">Yashraj Jain</h5>
                <p class="testimonial-role">Age - 24</p>
              </div>
              <img src="images/yashraj.avif" alt="Emma Watson" class="testimonial-img">
            </div>
          </div>

          <div class="testimonial-card">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
              I used the amount for my medical expenses. It's easy to get the amount
              compare to other platforms if you're eligible & It's very transparent about everything,
              nothing
              they hide from their User.
            </p>
            <div class="testimonial-author-info">
              <div>
                <h5 class="testimonial-author">Alok Mondal</h5>
                <p class="testimonial-role">Age - 23</p>
              </div>
              <img src="images/alok.avif" alt="Emma Watson" class="testimonial-img">
            </div>
          </div>

          <div class="testimonial-card">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
              XpressLoan is hassle free and has reasonable rate of interest. I took an
              education loan, and it was easy to process and convenient to repay.
            </p>
            <div class="testimonial-author-info">
              <div>
                <h5 class="testimonial-author">Sushil Pandey</h5>
                <p class="testimonial-role">Age - 43</p>
              </div>
              <img src="images/sushil.avif" alt="Emma Watson" class="testimonial-img">
            </div>
          </div>

          <div class="testimonial-card">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
              I took a loan from XpressLoan for my home inauguration. It had better and
              more attractive interest rates compared to KreditBee, Early salary, IDFC First.
            </p>
            <div class="testimonial-author-info">
              <div>
                <h5 class="testimonial-author">Ankit Singh</h5>
                <p class="testimonial-role">Age - 23</p>
              </div>
              <img src="images/ankitt.avif" alt="Emma Watson" class="testimonial-img">
            </div>
          </div>
        </div>
      </div>

    </div>


  </section>


<?= $this->endSection() ?>
