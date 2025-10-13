<!-- main Video Section -->
<div class="video-banner">
  <div class="video-block">
    <div class="swiper main-slider">
      <div class="swiper-wrapper">
        <?php
         if(!empty($slider[0]->slider_title) || !empty($slider[0]->slider_image)) {
        ?>
        @foreach ($slider as $sliderData)
        <div class="swiper-slide">
          <img class="img-fluid" alt="Image" src="{{ $sliderData->slider_image }}" />
        </div>
        @endforeach
        <?php } else { ?>
        <div class="swiper-slide">
          <img class="img-fluid" alt="Image" src="assets/img/banner-3.png" />
        </div>
        <?php } ?>
      </div>

      <!-- Slider Navigation -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</div>

<!-- Swiper Script -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper('.main-slider', {
    direction: 'vertical',
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    effect: 'slide',
    speed: 800,
  });
</script>

<!-- Slider Styles -->
<style>
/* Remove unwanted spacing */
body, html {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Prevent top white space */
.video-banner {
  margin: 0;
  padding: 0;
  width: 100%;
  height: calc(100vh - 120px); /* Adjust based on header height */
  overflow: hidden;
}

/* Swiper container full height */
.video-block, .swiper {
  height: 100%;
}

/* Centering slides */
.swiper-slide {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #000; /* Avoids white flash */
}

.swiper-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Slider arrows */
.swiper-button-prev, .swiper-button-next {
  position: absolute;
  background: white;
  padding: 10px;
  border-radius: 50%;
  font-size: 20px !important;
  color: black;
  z-index: 10;
  top: 50%;
  transform: translateY(-50%);
}

@media (max-width: 640px) {
  .video-banner {
    height: 300px;
  }
}
</style>
