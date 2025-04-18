<?= $this->extend('web/templates/main') ?>

<?= $this->section('content') ?>

<style>
  .blog-detail-section {
    background: #f9f9f9;
    padding: 3rem 0;
  }

  .blog-detail-img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 1.5rem;
    margin-top: 4rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  }

  .blog-detail-title {
    font-size: 2.5rem;
    color: #243771;
    margin-bottom: 1rem;
    font-weight: 700;
    line-height: 1.3;
  }

  .blog-detail-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 2rem;
  }

  .blog-detail-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #444;
  }

  /* Sidebar Widget */
  .sidebar-widget {
    background-color: #243771;
    border-radius: 10px;
      margin-top: - 0.4rem;
  }

  .sidebar-widget h3 {
    font-size: 1.5rem;
    color: #243771;
    margin-bottom: 1rem;
  }

  .sidebar-widget ul {
    list-style: none;
    padding: 0;
  }

  .sidebar-widget ul li {
    margin-bottom: 0.75rem;
  }

  .sidebar-widget ul li a {
    display: inline-block;
    padding: 0.4rem 0.75rem;
    background: #f1f1f1;
    border-radius: 5px;
    color: #243771;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .sidebar-widget ul li a:hover {
    background: #243771;
    color: #fff;
  }

  /* CTA Section */
  .cta-section {
    background-color: #243771;
    color: #fff;
    padding: 1.8rem 1.2rem;
    text-align: center;
    border-radius: 10px;
    margin-top: 72px;
  }

  .cta-section h3 {
    font-size: 1.4rem;
    margin-bottom: 0.8rem;
  }

  .cta-section p {
    font-size: 1rem;
    margin-bottom: 1.2rem;
  }

  .cta-btn {
    display: inline-block;
    padding: 0.6rem 1.4rem;
    background-color: #f9c200;
    color: #243771;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s ease;
  }

  .cta-btn:hover {
    background-color: #e6b400;
    color: #fff;
  }

  .blog-detail-content h2,
.blog-detail-content h3,
.blog-detail-content h4 {
  margin-top: 2rem;
  margin-bottom: 1rem;
  color: #243771;
  font-weight: 600;
}

.blog-detail-content p {
  margin-bottom: 1.2rem;
  font-size: 1.1rem;
  color: #444;
}

.blog-detail-content a {
  color: #007bff;
  text-decoration: underline;
}

.blog-detail-content a:hover {
  color: #0056b3;
  text-decoration: none;
}

.blog-detail-content img {
  max-width: 100%;
  height: auto;
  margin: 0.5rem 0;
  border-radius: 8px;
  box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
}

.blog-detail-content blockquote {
  background: #f2f2f2;
  border-left: 4px solid #243771;
  padding: 1rem 1.2rem;
  margin: 1.5rem 0;
  font-style: italic;
  color: #333;
}

.blog-detail-content ul,
.blog-detail-content ol {
  padding-left: 1.5rem;
  margin-bottom: 1.5rem;
}

.blog-detail-content ul li,
.blog-detail-content ol li {
  margin-bottom: 0.5rem;
  font-size: 1.05rem;
}

.blog-detail-content strong {
  font-weight: 600;
  color: #222;
}

.category-links {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
 padding: 14px;
}

.category-badge {
  background-color: #f1f1f1;
  color: #243771;
  padding: 8px 14px;
  border-radius: 20px;
  font-size: 0.95rem;
  text-decoration: none;
  transition: all 0.3s ease;
  border: 1px solid #ccc;
}

.category-badge:hover {
  background-color: #243771;
  color: #fff;
  border-color: #243771;
}

</style>

<section class="blog-detail-section">
  <div class="container">
    <div class="row">
      
      <!-- Blog Content -->
      <div class="col-md-8">
        <img src="<?= esc($blog['image']) ?>" alt="<?= esc($blog['name']) ?>" class="blog-detail-img">
        
        <h1 class="blog-detail-title"><?= esc($blog['name']) ?></h1>

        <div class="blog-detail-meta">
          <span class="author"><strong>Author:</strong> Devendra Dode</span>
          <span class="date"><strong>Published:</strong> <?= date('d M Y', strtotime($blog['created_at'])) ?></span>
          <span class="date"><strong>Updated:</strong> <?= date('d M Y', strtotime($blog['updated_at'])) ?></span>
        </div>

        <div class="blog-detail-content">
          <?= ($blog['details']) ?>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-md-4">

        <!-- CTA Widget -->
        <div class="sidebar-widget">
          <section class="cta-section">
            <h3>Apply for Your Personal Loan Now</h3>
            <p>Quick approval, easy steps, and secure process.</p>
            <a href="/apply-now" class="cta-btn">Apply Now</a>
          </section>
        </div>

        <!-- Categories Widget -->
        <div class="sidebar-widget">
          <h3>Categories</h3>
          <div class="category-links">
            <?php foreach ($services as $service): ?>
              <?php if ($service['type'] === 'Loan'): ?>
                <a href="<?= base_url('service/' . esc($service['slug'])) ?>" class="category-badge"><?= esc($service['name']) ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>

  <div class="premium-section">
    <div class="container mt-5">
      <h2 class="text-center mb-5">EMI <span class="text-dark">Calculator</span></h2>
      
      <div class="row gx-5">
        <div class="col-lg-7">
          <div class="slider-section mt-4">
            <div class="slider-container">
              <div class="d-flex justify-content-between">
                <label for="loanAmount" class="fs-5">Loan Amount (₹)</label>
                <input type="number" class="form-control mb-2 w-25 text-center" id="loanAmountDisplay" value="500000">
              </div>
              <input type="range" class="form-range" id="loanAmount" min="10000" max="50000000" step="10000" value="500000">
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
