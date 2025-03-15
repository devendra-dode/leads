<footer class="section-sm bg-tertiary">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-2 col-md-4 col-6 mb-4">
				<div class="footer-widget">
				    <h5 class="mb-4 text-primary font-secondary">Our Services</h5>
				    <ul class="list-unstyled">
				        <?php 
				        $filteredServices = array_filter($services, function ($service) {
				            return $service['type'] === 'service';
				        });
				        ?>

				        <?php if (!empty($filteredServices)): ?>
				            <?php foreach ($filteredServices as $service): ?>
				                <li class="mb-2">
				                    <a href="<?= base_url('service/' . esc($service['slug'])) ?>">
				                        <?= esc($service['name']) ?>
				                    </a>
				                </li>
				            <?php endforeach; ?>
				        <?php else: ?>
				            <li class="mb-2">No services available</li>
				        <?php endif; ?>
				    </ul>
				</div>


			</div>
			<div class="col-lg-2 col-md-4 col-6 mb-4">
				<div class="footer-widget">
					<h5 class="mb-4 text-primary font-secondary">About</h5>
				    <ul class="list-unstyled">
				        <?php 
				        $filteredServices = array_filter($services, function ($service) {
				            return $service['type'] === 'page';
				        });
				        ?>

				        <?php if (!empty($filteredServices)): ?>
				            <?php foreach ($filteredServices as $service): ?>
				                <li class="mb-2">
				                    <a href="<?= base_url('service/' . esc($service['slug'])) ?>">
				                        <?= esc($service['name']) ?>
				                    </a>
				                </li>
				            <?php endforeach; ?>
				        <?php else: ?>
				            <li class="mb-2">No page available</li>
				        <?php endif; ?>
				    </ul>
				</div>
			</div>
<!-- 			<div class="col-lg-2 col-md-4 col-6 mb-4">
				<div class="footer-widget">
					<h5 class="mb-4 text-primary font-secondary">Help</h5>
					<ul class="list-unstyled">
						<li class="mb-2"><a href="contact.html">Contact Us</a>
						</li>
						<li class="mb-2"><a href="faq.html">FAQs</a>
						</li>
					</ul>
				</div>
			</div> -->
			<div class="col-lg-4 col-md-12 newsletter-form">
				<div style="background-color: #F4F4F4; padding: 35px;">
					<h5 class="mb-4 text-primary font-secondary">Subscribe</h5>
					<div class="pe-0 pe-xl-5">
						<form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank">
							<div class="input-group mb-3">
								<input type="text" class="form-control shadow-none bg-white border-end-0" placeholder="Email address"> <span class="input-group-text border-0 p-0">
                    <button class="input-group-text border-0 bg-primary" type="submit" name="subscribe"
                      aria-label="Subscribe for Newsletter"><i class="fas fa-arrow-right"></i></button>
                  </span>
							</div>
							<div style="position: absolute; left: -5000px;" aria-hidden="true">
								<input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
							</div>
						</form>
					</div>
					<p class="mb-0">Lorem ipsum dolor sit amet, rdghds consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat</p>
				</div>
			</div>
		</div>
		<div class="row align-items-center mt-5 text-center text-md-start">
			<div class="col-lg-4">
        <a href="index.html">
          <img loading="prelaod" decoding="async" class="img-fluid" width="160" src="<?= base_url() ?>assets/web/theme/images/logo.png" alt="Wallet">
        </a>
			</div>
<!-- 			<div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
				<ul class="list-unstyled list-inline mb-0 text-lg-center">
					<li class="list-inline-item me-4"><a class="text-black" href="privacy-policy.html">Privacy Policy</a>
					</li>
					<li class="list-inline-item me-4"><a class="text-black" href="terms.html">Terms &amp; Conditions</a>
					</li>
				</ul>
			</div> -->
			<div class="col-lg-4 col-md-6 text-md-end mt-4 mt-md-0">
				<ul class="list-unstyled list-inline mb-0 social-icons">
					<li class="list-inline-item me-3"><a title="Explorer Facebook Profile" class="text-black" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
					</li>
					<li class="list-inline-item me-3"><a title="Explorer Twitter Profile" class="text-black" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
					</li>
					<li class="list-inline-item me-3"><a title="Explorer Instagram Profile" class="text-black" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>


<!-- # JS Plugins -->
<script src="<?= base_url() ?>assets/web/theme/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/web/theme/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/web/theme/plugins/slick/slick.min.js"></script>
<script src="<?= base_url() ?>assets/web/theme/plugins/scrollmenu/scrollmenu.min.js"></script>

<!-- Main Script -->
<script src="<?= base_url() ?>assets/web/theme/js/script.js"></script>

</body>
</html>