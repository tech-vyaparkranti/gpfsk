<div class="video-banner">
  <div class="video-block">
    <div class="swiper main-slider">
      <div class="swiper-wrapper">
        <?php
if (!empty($slider[0]->slider_title) || !empty($slider[0]->slider_image)) {
            ?>
        @foreach ($slider as $sliderData)
          <div class="swiper-slide">
            <img class="img-fluid" width="" height="" alt="Image" src="<?php    echo $sliderData->slider_image;?>" />
            {{-- <div class="video-content">
              <span class="cursor typewriter-animation bottomclass"
                style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.9);">{!! $sliderData->slider_title; !!}</span>
              <p class="cursor typewriter-animation bottomclass"
                style="font-size:40px;font-weight:bold;text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.9);">
                <?php echo $sliderData->sort_about;?>
              </p>
              <a href="<?php echo $sliderData->button_link;?>" aria-label="Explore The World">Get in touch</a>
            </div> --}}
          </div>
        @endforeach
        <?php } else { ?>
        <div class="swiper-slide">
          <img class="img-fluid" width="" height="" alt="Image" src="assets/img/banner-3.png" />
          {{-- <div class="video-content">
            <span>Travel Job </span>
            <h1>Serving Since 2023</h1>
            <a href="{{ route('contactUs') }}" aria-label="Explore The World">Get in touch</a>
          </div> --}}
        </div>
        <?php }
;?>
      </div>
      {{-- <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div> --}}
    </div>
  </div>
</div>

<style>
  @keyframes slideUp {
    from {
      transform: translateY(100%);
      opacity: 0;
    }

    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  .video-content {
    opacity: 0;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px 50px;
    color: white;
    text-align: left;
    z-index: 2;
  }

  .swiper-slide-active .video-content {
    animation: slideUp 0.8s ease-out forwards;
  }

  .swiper-slide-active .video-content span {
    animation-delay: 0.1s;
  }

  .swiper-slide-active .video-content p {
    animation-delay: 0.3s;
  }

  .swiper-slide-active .video-content a {
    animation-delay: 0.5s;
  }

  @media (max-width: 800px) {
    .bottomclass {
      font-size: 10px !important;
      padding: 0px;
      margin: 0px;
    }

    .video-content {
      padding: 10px 20px;
    }
  }

  .cursor {
    overflow: hidden;
    white-space: nowrap;
  }

  .typewriter-animation {
    animation: typewriter 2s steps(50) 1s 1 normal both, blinkingCursor 300ms steps(50) infinite normal;
  }

  @keyframes typewriter {
    from {
      width: 0;
    }

    to {
      width: 100%;
    }
  }

  @keyframes blinkingCursor {
    from {
      border-right-color: rgba(255, 255, 255, .75);
    }

    to {
      border-right-color: transparent;
    }
  }

  .swiper-button-prev,
  .swiper-button-next {
    position: absolute;
    top: 200px;
    background: white;
    padding: 10px;
    border-radius: 50%;
    font-size: 20px !important;
    z-index: 10;
  }

  @media (max-width: 640px) {

    .swiper-button-prev,
    .swiper-button-next {
      top: 90px;
    }
  }

  .swiper {
    width: 100%;
    height: 500px;
  }

  .swiper-slide {
    position: relative;
  }

  .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .video-block,
  .main-slider {
    height: 100%;
  }
</style>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  const mainSlider = new Swiper('.main-slider', {
    direction: 'vertical',
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    speed: 1000,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });

  function animateActiveSlide(swiper) {
    swiper.slides.forEach(slide => {
      const content = slide.querySelector('.video-content');
      if (content) {
        content.style.opacity = '0';
      }
    });

    const activeSlide = swiper.slides[swiper.realIndex];
    const activeContent = activeSlide ? activeSlide.querySelector('.video-content') : null;

    if (activeContent) {
      setTimeout(() => {
        activeContent.style.opacity = '1';
      }, 50);
    }
  }

  mainSlider.on('init', animateActiveSlide);
  mainSlider.on('slideChangeTransitionEnd', animateActiveSlide);
</script>