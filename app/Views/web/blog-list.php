<?= $this->extend('web/templates/main') ?>

<?= $this->section('content') ?>

  <style>

    /* Blog Section */
    .blog-section .page-title {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 2rem;
      color: #243771;
    }

    .blog-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 2rem;
    }

    .blog-card {
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 8px 16px rgba(0,0,0,0.08);
      transition: transform 0.2s ease-in-out;
    }
    .blog-card:hover {
      transform: translateY(-5px);
    }

    .blog-card img {
      width: 100%;
      height: auto;
      display: block;
    }

    .blog-content {
      padding: 1.2rem;
    }
    .blog-content h2 {
      font-size: 1.4rem;
      color: #243771;
      margin-bottom: 0.6rem;
    }
    .blog-content .excerpt {
      font-size: 1rem;
      margin-bottom: 1rem;
      color: #666;
    }
    .read-more {
      display: inline-block;
      color: #fff;
      background: #243771;
      padding: 0.6rem 1rem;
      border-radius: 5px;
      text-decoration: none;
      font-size: 0.95rem;
      transition: background 0.3s;
    }
    .read-more:hover {
      background: #1c2c5a;
    }
    /* Blog Pagination */
.pagination {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin-top: 2rem;
  margin-bottom: 2rem;
}

.pagination a {
  color: #243771;
  background-color: #fff;
  border: 1px solid #ddd;
  padding: 0.6rem 1rem;
  border-radius: 5px;
  font-size: 1rem;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.pagination a:hover {
  background-color: #243771;
  color: #fff;
}

.pagination .page-item.active a {
  background-color: #243771;
  color: #fff;
  border: 1px solid #243771;
}

.pagination .page-item.disabled a {
  background-color: #f5f5f5;
  color: #ccc;
  border: 1px solid #ccc;
}

  </style>

<section class="blog-section">
  <div class="container">
    <h1 class="page-title">Latest Blog Posts</h1>

    <div class="blog-list">
      <?php foreach ($blogs as $blog): ?>
        <div class="blog-card">
          <img src="<?= esc($blog['image']) ?>" alt="<?= esc($blog['name']) ?>" />
          <div class="blog-content">
            <h2><?= esc($blog['name']) ?></h2>
            <p class="excerpt"><?= esc($blog['short_description']) ?></p>
            <a href="<?= site_url('blog/' . $blog['slug']) ?>" class="read-more">Read More →</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Pagination Section -->
    <div class="pagination">
      <?= $pager->links() ?>
    </div>

  </div>
</section>

<section class="cta-section" style="border-radius: 0px;">
  <h3>Apply for Your Personal Loan Now</h3>
  <p>Quick approval, easy steps, and secure process.</p>
  <a href="/apply-now" class="cta-btn">Apply Now</a>
</section>

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

<?= $this->endSection() ?>
