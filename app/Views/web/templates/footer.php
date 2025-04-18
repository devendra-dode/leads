
  <style>
    @media (max-width: 767.98px) {
      #stepImage {
        max-height: 300px;
      }
    }
  </style>
  
  <div class="container mt-5 pb-5">
    <h2 class="fs-1 fw-bold" style="padding: 20px; text-align:center;">Our Partners</h2>
    <section class="customer-logos slider mt-4">

      <?php if (!empty($partners) && is_array($partners)): ?>
          <?php foreach ($partners as $partner): ?>
              <div class="slide text-center">
                  <img src="<?= esc($partner['logo']) ?>" alt="<?= esc($partner['name']) ?>" style="max-height: 60px;">
              </div>
          <?php endforeach; ?>
      <?php else: ?>
          <p>No partners found.</p>
      <?php endif; ?>

    </section>
  </div>

  <!-- =============================contact us ================================ -->

  <div style="background-color: #ebf1ff;" id="contact-us">
    <div class="container mt-5">
      <div class="contact-container p-4">
        <h2 class="text-center mb-5 fs-1"><strong>Contact <span>Us</span></strong></h2>
        <div class="row g-4 mt-5 mb-5">
          <div class="col-lg-6 col-md-12 contact-info">
            <p class="fs-5"><span class="icon"><i class="fas fa-map-marker-alt"></i></span><strong
                style="margin-top: -10px;">CORPORATE ADDRESS:</strong></p>
            <address style="margin-top: -30px; margin-left: 55px;">BHIVE Premium Church Street # 48, Church
              St.<br>Harladevpur, Shanthala Nagar, Ashok Nagar<br>Bengaluru, Karnataka-560 001</address>

            <p class="fs-5"><span class="icon"><i class="fas fa-map-marker-alt"></i></span><strong>BRANCH
                ADDRESS:</strong></p>
            <address style="margin-top: -25px; margin-left: 55px;">3rd Floor, Vasavi MPM Grand, 4th Level, Beside Metro
              Station,<br>Ameerpet Hyderabad, Telangana</address>

            <p><span class="icon"><i class="fas fa-envelope"></i></span><strong class="fs-5">Email:</strong>
              paisaclick1@gmail.com</p>
            <p><span class="icon"><i class="fas fa-phone"></i></span><strong class="fs-5">Call:</strong> +91 831 9242 411</p>

          </div>
          <div class="col-lg-6 col-md-12 contact-form">

<form id="contactForm" novalidate>
  <div class="row g-3">
    <div class="col-md-6">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
      <div class="invalid-feedback">Please enter a valid name (at least 3 characters).</div>
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control mobile-number" id="contact" name="contact" placeholder="Contact Number">
      <div class="invalid-feedback">Enter a valid 10-digit mobile number.</div>
    </div>
  </div>
  <div class="mt-3">
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    <div class="invalid-feedback">Please enter a valid email address.</div>
  </div>
  <div class="mt-3">
    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
    <div class="invalid-feedback">Subject is required.</div>
  </div>
  <div class="mt-3">
    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message"></textarea>
    <div class="invalid-feedback">Message must be at least 10 characters.</div>
  </div>

  <input type="hidden" name="recaptcha_token" id="recaptcha_token">

  <div class="text-end mt-3">
    <button type="submit" class="btn btn-custom rainbow">Send Now!</button>
  </div>
</form>


          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- ====================footer========================== -->

  <footer class="bg-black text-white py-5">
    <div class="container">
      <div class="row align-items-start">
        <div class="col-lg-2">
          <h5>Contact us</h5>
          <p><i class="fas fa-phone"></i> +91 831 9242 411</p>
          <p><i class="fas fa-envelope"></i> PaisaClick1@gmail.com</p>
          <p><i class="fas fa-map-marker-alt"></i> 3rd Floor, Vasavi MPM Grand, 4th Level, Beside Metro Station,<br>Ameerpet Hyderabad, Telangana (MON to SUN 10 AM to 7 PM)</p>

          <div>
            <i class="bi bi-instagram me-2"></i>
            <i class="bi bi-twitter me-2"></i>
            <i class="bi bi-youtube"></i>
          </div>
        </div>
        <div class="col-lg-2">
          <h5>Services</h5>
          <ul class="list-unstyled">
          <?php foreach ($services as $service): ?>
              <?php if ($service['type'] === 'Loan'): ?>
                   <li class="footerLinks"><a href="<?= base_url('service/' . esc($service['slug'])) ?>"><?= esc($service['name']) ?></a></li>
              <?php endif; ?>
          <?php endforeach; ?>
          </ul>
        </div>
<?php
// Check if there are any credit services before displaying the section
$creditServices = array_filter($services, function($service) {
    return $service['type'] === 'Credit';
});

// Check if there are any insurance services before displaying the section
$insuranceServices = array_filter($services, function($service) {
    return $service['type'] === 'Insurance';
});
?>

<?php if (!empty($creditServices)): ?>
    <div class="col-lg-2">
        <h5>Credit Cards</h5>
        <ul class="list-unstyled">
            <?php foreach ($creditServices as $service): ?>
                <li class="footerLinks">
                    <a href="<?= base_url('service/' . esc($service['slug'])) ?>">
                        <?= esc($service['name']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (!empty($insuranceServices)): ?>
    <div class="col-lg-2">
        <h5>Insurance</h5>
        <ul class="list-unstyled">
            <?php foreach ($insuranceServices as $service): ?>
                <li class="footerLinks">
                    <a href="<?= base_url('service/' . esc($service['slug'])) ?>">
                        <?= esc($service['name']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

        <div class="col-lg-2">
          <h5>Resources</h5>
          <ul class="list-unstyled">
          <?php foreach ($services as $service): ?>
              <?php if ($service['type'] === 'MainPage'): ?>
                    <li class="footerLinks"><a href="<?= base_url('page/' . esc($service['slug'])) ?>"><?= esc($service['name']) ?></a></li>
              <?php endif; ?>
          <?php endforeach; ?>
          <li><a href="https://paisaclick.com/sitemap.xml">Sitemap</a></li>
          </ul>
        </div>

        <div class="col-lg-2">
          <h5>Terms & Privacy</h5>
          <ul class="list-unstyled">
          <?php foreach ($services as $service): ?>
              <?php if ($service['type'] === 'SidePage'): ?>
                  <li class="footerLinks"><a href="<?= base_url('page/' . esc($service['slug'])) ?>"><?= esc($service['name']) ?></a></li>
              <?php endif; ?>
          <?php endforeach; ?>
          </ul>
        </div>


      </div>
      <hr class="text-white">
        <div style="text-align: center; font-family: Arial, sans-serif; line-height: 1.6;">
          <p>&copy; 2025 PaisaClick. All rights reserved.</p>
          <p>
            Developed by <strong>Devendra Dode</strong><br>
            Email: <a href="mailto:devendra1821@gmail.com" style="text-decoration: none; color: inherit;">devendra1821@gmail.com</a><br>
            Mobile: <a href="tel:+918959560347" style="text-decoration: none; color: inherit;">+91 895 956 0347</a><br>
            LinkedIn: <a href="https://in.linkedin.com/in/devendra-dode-771b5b16a" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
              https://in.linkedin.com/in/devendra-dode-771b5b16a
            </a>
          </p>
        </div>

    </div>
  </footer>


<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-success text-white">
      <div class="modal-header">
        <h5 class="modal-title">Success</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="successMsg"></div>
    </div>
  </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-danger text-white">
      <div class="modal-header">
        <h5 class="modal-title">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="errorMsg"></div>
    </div>
  </div>
</div>


<div class="modal fade" id="applyLoanFormModel" tabindex="-1" aria-labelledby="applyLoanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyLoanModalLabel"><strong>Apply <span>Loan</span></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
          <div class="contact-container p-4">
            <form id="applyLoanForm2" novalidate>
              <div class="row g-4">
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

                <div class="col-md-6">
                  <input type="text" class="form-control" id="name1" name="name" placeholder="Name">
                  <div class="invalid-feedback">Please enter a name.</div>
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control mobile-number" id="contact1" name="contact" placeholder="Contact Number">
                  <div class="invalid-feedback">Enter a valid 10-digit mobile number.</div>
                </div>
              </div>

              <input type="hidden" name="loan_recaptcha_token" id="loan_recaptcha_token">

              <div class="text-end mt-4">
                <button type="submit" class="btn btn-custom rainbow">Apply Now!</button>
              </div>
            </form>
          </div>
        </div>      </div>
    </div>
  </div>
</div>

<script src="https://www.google.com/recaptcha/api.js?render=6LdPRhkrAAAAAKXsw3l_HRwMoLSGjl5yJsSa9w-D"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const submitButton = form.querySelector('button[type="submit"]'); 
    const originalButtonText = submitButton.innerHTML; 



    const nameInput = document.getElementById('name');
    const contactInput = document.getElementById('contact');
    const emailInput = document.getElementById('email');
    const subjectInput = document.getElementById('subject');
    const messageInput = document.getElementById('message');

    const validators = {
      name: val => /^[a-zA-Z\s]{3,}$/.test(val),
      contact: val => /^[6-9]\d{9}$/.test(val),
      email: val => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val),
      subject: val => val.trim().length > 0,
      message: val => val.trim().length >= 10
    };

const validateField = (input, validator) => {
  const value = input.value.trim();
  
  // Check if the value is valid using the provided validator function
  if (!validator(value)) {
    input.classList.add('is-invalid');
    input.classList.remove('is-valid');  // Remove 'is-valid' if the input is invalid
    return false;
  } else {
    input.classList.remove('is-invalid'); // Remove 'is-invalid' if the input is valid
    input.classList.add('is-valid');      // Add 'is-valid' if the input is valid
    return true;
  }
};


    // Live validation
    nameInput.addEventListener('input', () => validateField(nameInput, validators.name));
    contactInput.addEventListener('input', () => validateField(contactInput, validators.contact));
    emailInput.addEventListener('input', () => validateField(emailInput, validators.email));
    subjectInput.addEventListener('input', () => validateField(subjectInput, validators.subject));
    messageInput.addEventListener('input', () => validateField(messageInput, validators.message));

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      submitButton.disabled = true;
      submitButton.innerHTML = 'Please Wait...';

      const valid =
        validateField(nameInput, validators.name) &
        validateField(contactInput, validators.contact) &
        validateField(emailInput, validators.email) &
        validateField(subjectInput, validators.subject) &
        validateField(messageInput, validators.message);

      if (!valid) return;

      grecaptcha.ready(function () {
        grecaptcha.execute('6LdPRhkrAAAAAKXsw3l_HRwMoLSGjl5yJsSa9w-D', { action: 'submit' }).then(function (token) {
          document.getElementById('recaptcha_token').value = token;

          const formData = new FormData(form);

          fetch('/contact-submit', {
            method: 'POST',
            body: formData
          })
            .then(response => response.json())
            .then(data => {

               submitButton.disabled = false;
               submitButton.innerHTML = originalButtonText;

              if (data.status === 'success') {
                showSuccessModal(data.message || 'Message sent successfully!');
                form.reset();
              } else {
                let msg = data.message || 'Something went wrong!';
                if (data.errors) {
                  msg = Object.values(data.errors).join('<br>');
                }
                showErrorModal(msg);
              }
            })
            .catch(() => showErrorModal('Submission failed. Try again.'));
        });
      });
    });

    // Modal handlers
    function showSuccessModal(message) {
      document.getElementById('successMsg').innerHTML = message;
      const modal = new bootstrap.Modal(document.getElementById('successModal'));
      modal.show();
      setTimeout(() => modal.hide(), 3000);
    }

    function showErrorModal(message) {
      document.getElementById('errorMsg').innerHTML = message;
      const modal = new bootstrap.Modal(document.getElementById('errorModal'));
      modal.show();
      setTimeout(() => modal.hide(), 3000);
    }
  });

  document.querySelectorAll('.mobile-number').forEach(input => {
  input.addEventListener('input', function () {
    // Allow only numbers (remove non-digit characters)
    this.value = this.value.replace(/\D/g, '');

    // Limit to 10 digits
    if (this.value.length > 10) {
      this.value = this.value.slice(0, 10);
    }

    // Validate Indian mobile number (starts with 6-9 and has 10 digits)
    const pattern = /^[6-9]\d{9}$/;
    if (pattern.test(this.value)) {
      this.classList.remove('is-invalid');
      this.classList.add('is-valid');
    } else {
      this.classList.remove('is-valid');
      this.classList.add('is-invalid');
    }
  });
});

</script>


  <!-- ====================footer========================== -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="<?= base_url() ?>public/assets/web/scripts.js"></script>


  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const modalTrigger = document.querySelector('.open-loan-modal');
    const modal = new bootstrap.Modal(document.getElementById('applyLoanModal'));

    if (modalTrigger) {
      modalTrigger.addEventListener('click', function () {
        modal.show();
      });
    }
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('applyLoanForm');
  const nameInput = document.getElementById('name');
  const contactInput = document.getElementById('contact');
  const loanTypeRadios = document.querySelectorAll('input[name="loan_type"]');
  const recaptchaInput = document.getElementById('loan_recaptcha_token');
  const submitButton = form.querySelector('button[type="submit"]');
  const originalButtonText = submitButton.innerHTML;

  const getSelectedLoanType = () => {
    return Array.from(loanTypeRadios).find(r => r.checked);
  };

  const validateName = () => {
    const value = nameInput.value.trim();
    if (value === '') {
      nameInput.classList.add('is-invalid');
      return false;
    } else {
      nameInput.classList.remove('is-invalid');
      nameInput.classList.add('is-valid');
      return true;
    }
  };

  const validateContact = () => {
    const value = contactInput.value.trim();
    const isValid = /^[6-9]\d{9}$/.test(value);
    if (!isValid) {
      contactInput.classList.add('is-invalid');
      return false;
    } else {
      contactInput.classList.remove('is-invalid');
      contactInput.classList.add('is-valid');
      return true;
    }
  };

  const validateLoanType = () => {
    const selected = getSelectedLoanType();
    const container = document.querySelector('.loan-type-selector');
    const feedback = container.nextElementSibling;

    if (!selected) {
      feedback.style.display = 'block';
      return false;
    } else {
      feedback.style.display = 'none';
      return true;
    }
  };

  // Limit contact input to 10 digits
  contactInput.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, '').slice(0, 10);
  });

  // Real-time validation
  nameInput.addEventListener('input', validateName);
  contactInput.addEventListener('input', validateContact);
  loanTypeRadios.forEach(radio => {
    radio.addEventListener('change', validateLoanType);
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    submitButton.disabled = true;
    submitButton.innerHTML = 'Please wait...';

    const isNameValid = validateName();
    const isContactValid = validateContact();
    const isLoanTypeValid = validateLoanType();

    if (!(isNameValid && isContactValid && isLoanTypeValid)) {
      submitButton.disabled = false;
      submitButton.innerHTML = originalButtonText;
      return;
    }

    grecaptcha.ready(function () {
      grecaptcha.execute('6LdPRhkrAAAAAKXsw3l_HRwMoLSGjl5yJsSa9w-D', { action: 'submit' }).then(function (token) {
        recaptchaInput.value = token;

        const formData = new FormData(form);

        fetch('/post-apply-now', {
          method: 'POST',
          body: formData
        })
        .then(res => {
          if (!res.ok) {
            throw new Error(`HTTP error! status: ${res.status}`);
          }

          // Check if the response is empty or not in JSON format
          return res.text().then(text => {
            try {
              return JSON.parse(text);
            } catch (e) {
              throw new Error('Invalid JSON response');
            }
          });
        })
        .then(data => {
          submitButton.disabled = false;
          submitButton.innerHTML = originalButtonText;

          if (data.status === 'success') {
            showSuccessModal(data.message || 'Application submitted successfully!');
            form.reset();
            form.querySelectorAll('.is-valid').forEach(el => el.classList.remove('is-valid'));
          } else {
            console.log(data);
            showErrorModal(data.message || 'Something went wrong.');
          }
        })
        .catch((error) => {
          // Enable the submit button and restore the original button text
          submitButton.disabled = false;
          submitButton.innerHTML = originalButtonText;

          // Log the error to the console (for debugging purposes)
          console.error('Submission failed with error:', error);

          // Show the error message in the modal (optional: show the error message or a general message)
          showErrorModal('Submission failed. Please try again. Error: ' + error.message);
        });
      });
    });
  });

  function showSuccessModal(message) {
    document.getElementById('successMsg').innerHTML = message;
    const modal = new bootstrap.Modal(document.getElementById('successModal'));
    modal.show();
    setTimeout(() => modal.hide(), 3000);
  }

  function showErrorModal(message) {
    document.getElementById('errorMsg').innerHTML = message;
    const modal = new bootstrap.Modal(document.getElementById('errorModal'));
    modal.show();
    setTimeout(() => modal.hide(), 3000);
  }
});

</script>

<script>

  document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('applyLoanForm2');
  const nameInput = document.getElementById('name1');
  const contactInput = document.getElementById('contact1');
  const loanTypeRadios = document.querySelectorAll('input[name="loan_type"]');
  const recaptchaInput = document.getElementById('loan_recaptcha_token');
  const submitButton = form.querySelector('button[type="submit"]');
  const originalButtonText = submitButton.innerHTML;

  const getSelectedLoanType = () => {
    return Array.from(loanTypeRadios).find(r => r.checked);
  };

  const validateName = () => {
    const value = nameInput.value.trim();
    if (value === '') {
      nameInput.classList.add('is-invalid');
      return false;
    } else {
      nameInput.classList.remove('is-invalid');
      nameInput.classList.add('is-valid');
      return true;
    }
  };

  const validateContact = () => {
    const value = contactInput.value.trim();
    const isValid = /^[6-9]\d{9}$/.test(value);
    if (!isValid) {
      contactInput.classList.add('is-invalid');
      return false;
    } else {
      contactInput.classList.remove('is-invalid');
      contactInput.classList.add('is-valid');
      return true;
    }
  };

  const validateLoanType = () => {
    const selected = getSelectedLoanType();
    const container = document.querySelector('.loan-type-selector');
    const feedback = container.nextElementSibling;

    if (!selected) {
      feedback.style.display = 'block';
      return false;
    } else {
      feedback.style.display = 'none';
      return true;
    }
  };

  // Limit contact input to 10 digits
  contactInput.addEventListener('input', function () {
    this.value = this.value.replace(/\D/g, '').slice(0, 10);
  });

  // Real-time validation
  nameInput.addEventListener('input', validateName);
  contactInput.addEventListener('input', validateContact);
  loanTypeRadios.forEach(radio => {
    radio.addEventListener('change', validateLoanType);
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    submitButton.disabled = true;
    submitButton.innerHTML = 'Please wait...';

    const isNameValid = validateName();
    const isContactValid = validateContact();
    const isLoanTypeValid = validateLoanType();

    if (!(isNameValid && isContactValid && isLoanTypeValid)) {
      submitButton.disabled = false;
      submitButton.innerHTML = originalButtonText;
      return;
    }


    grecaptcha.ready(function () {
      grecaptcha.execute('6LdPRhkrAAAAAKXsw3l_HRwMoLSGjl5yJsSa9w-D', { action: 'submit' }).then(function (token) {
        recaptchaInput.value = token;

        const formData = new FormData(form);

        fetch('/post-apply-now', {
          method: 'POST',
          body: formData
        })
        .then(res => {
          if (!res.ok) {
            throw new Error(`HTTP error! status: ${res.status}`);
          }

          // Check if the response is empty or not in JSON format
          return res.text().then(text => {
            try {
              return JSON.parse(text);
            } catch (e) {
              throw new Error('Invalid JSON response');
            }
          });
        })
        .then(data => {
          submitButton.disabled = false;
          submitButton.innerHTML = originalButtonText;

          const modalElement = document.getElementById('applyLoanFormModel');
          const applyLoanModal = bootstrap.Modal.getInstance(modalElement);
          if (applyLoanModal) applyLoanModal.hide();

          if (data.status === 'success') {
            showSuccessModal(data.message || 'Application submitted successfully!');
            form.reset();
            form.querySelectorAll('.is-valid').forEach(el => el.classList.remove('is-valid'));
          } else {
            console.log(data);
            showErrorModal(data.message || 'Something went wrong.');
          }
        })
        .catch((error) => {
          // Enable the submit button and restore the original button text
          submitButton.disabled = false;
          submitButton.innerHTML = originalButtonText;

          // Log the error to the console (for debugging purposes)
          console.error('Submission failed with error:', error);

          // Show the error message in the modal (optional: show the error message or a general message)
          showErrorModal('Submission failed. Please try again. Error: ' + error.message);
        });
      });
    });
  });

  function showSuccessModal(message) {
    document.getElementById('successMsg').innerHTML = message;
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();
    setTimeout(() => successModal.hide(), 3000);
  }

  function showErrorModal(message) {
    document.getElementById('errorMsg').innerHTML = message;
    const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
    errorModal.show();
    setTimeout(() => errorModal.hide(), 3000);
  }
});

  document.addEventListener('DOMContentLoaded', function () {
    const modalTrigger = document.querySelector('.open-loan-modal');
    const modal = new bootstrap.Modal(document.getElementById('applyLoanFormModel'));

    if (modalTrigger) {
      modalTrigger.addEventListener('click', function () {
        modal.show();
      });
    }
  });
</script>

</body>

</html>