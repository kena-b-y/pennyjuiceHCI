<template>
<Nav />

  <main>
    <section class="section-hero">
      <div class="hero">
        <div class="hero-text-box">
          <h1 class="heading-primary">
            100% blended fruit juice concentrate specifically designed for
            childcare centers.
          </h1>
          <p class="hero-description">
            The smart juice subscription that will keep children healthy
            365-days-per-year. Tailored to personal tastes and nutritional
            needs.
          </p>
          <router-link to="/products" class="btn btn--full margin-right-sm"
            >Order Now</router-link
          >
          <router-link to="/childcare" class="btn btn--outline"
            >About Us &darr;</router-link
          >
        </div>
        <div class="hero-img-box">
          <img
            class="hero-img"
            src="../.././assets/user/assets/img/hero-img.jpg"
            alt="Children enjoying juice sitted around a lake"
          />
        </div>
      </div>
    </section>

    <section class="section-about" id="sectionabout">
      <div class="container">
        <span class="subheading">About our products</span>
        <h2 class="heading-secondary">A daily dose of health</h2>
      </div>

      <div class="container grid grid--2-cols grid--center-v">
        <div class="step-text-box">
          <h3 class="heading-tertiary">Rainbows of exiciting flavors</h3>
          <p class="step-description">
            15 flavors available including 7 color free flavors. Each case
            contains 6 - ½ gallon bottles of your choice. We’ve designed them
            especially for childcare, daycare, preschool, basp and extended
            daycare. Get in touch with us today!
          </p>
        </div>
        <div class="step-img-box">
          <img
            src="../.././assets/user/assets/img/photo-1.png"
            alt="Fruits in water"
            class="step-img"
          />
        </div>

        <div class="step-img-box">
          <img
            src="../.././assets/user/assets/img/photo-2.png"
            alt="small boy with multiple glasses of different juices"
            class="step-img"
          />
        </div>
        <div class="step-text-box">
          <h3 class="heading-tertiary">
            Healthy Juice Concentrates for All Kids to Enjoy
          </h3>
          <p class="step-description">
            We provide a variety of flavors that all kids can enjoy! All the
            juice concentrates that we sell are compliant with the USDA and FDA
            guidelines. You don't need to refrigerate the concentrates before or
            after opening them.
          </p>
        </div>
      </div>
    </section>

    <section class="section-info">
      <div class="container center-text">
        <h3 class="info-heading">
          Penny Juice Products Comply With All Requirements for CACFP, Subsidy,
          and Nutrition Set Forth by the FDA
        </h3>

        <div class="info-box">
          <div class="info-text-box">
            <p class="info-description">
              If you're running a childcare center and want to serve healthy
              beverages to kids every day, order quality juice concentrates from
              Penny Juice of America.
            </p>
            <p class="info-description">
              Our system is fast and easy to use. Penny Juice greatly reduces
              storage and handling requirements. 1 gallon pre-measured mix
              pitchers available to assure cost control and flavor consistency
            </p>
            <router-link to="/childcare" class="btn btn--full"
              >Learn More &rarr;</router-link
            >
          </div>
          <div class="info-img-box">
            <img
              class="info-img"
              src="../.././assets/user/assets/img/verified.jpg"
              alt="Children enjoying juice sitted around a lake"
            />
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <h3 class="heading-tertiary">Contact Us</h3>
    <div class="contact">
      <div class="contact-info">
        <p class="contact-description">Penny Juice of America</p>
        <p class="contact-description">915 40th Ave Bettendorf, IA 52722</p>
        <p class="contact-description">pennyjuice@hotmail.com</p>
        <p class="contact-description"><span>Phone:</span> 563-386-1999</p>
        <p class="contact-description"><span>Fax:</span> 563-386-6200</p>
      </div>
      <div class="payment-img">
        <img
          class="contact-pay-img"
          src="../.././assets/user/assets/img/pay.png"
          alt="Payment Methods"
        />
      </div>
      <!-- <div class="contact-links">
          <a href="https://www.facebook.com/PENNYJUICE/">
            <i class="fab fa-facebook-f"></i
          ></a>
          <a
            href="https://twitter.com/1PENNYJUICE?ref_src=twsrc%5Etfw%7Ctwcamp%5Eembeddedtimeline%7Ctwterm%5Eprofile%3A1PENNYJUICE%7Ctwgr%5EeyJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3NlbnNpdGl2ZV9tZWRpYV9pbnRlcnN0aXRpYWxfMTM5NjMiOnsiYnVja2V0IjoiaW50ZXJzdGl0aWFsIiwidmVyc2lvbiI6bnVsbH0sInRmd190d2VldF9yZXN1bHRfbWlncmF0aW9uXzEzOTc5Ijp7ImJ1Y2tldCI6InR3ZWV0X3Jlc3VsdCIsInZlcnNpb24iOm51bGx9fQ%3D%3D&ref_url=https%3A%2F%2Fwww.pennyjuice.com%2F"
          >
            <i class="fab fa-twitter"></i
          ></a>
        </div> -->
    </div>
    <div class="extra-links">
      <span>Privacy Policy</span>
      <span> | </span>
      <span>Cookie Policy</span>
      <span> | </span>
      <span>Conditions of Use</span>
      <span> | </span>
      <span>Notice and Take Down Policy</span>
      <span> | </span>
      <span>Website Accessibility Policy</span>
    </div>
    <div class="copyright">
      <p>Copyright &copy;2022 All right reserved | Penny Juice</p>
    </div>
  </footer>
</template>
<script>
import Nav from "./Nav.vue";

export default {
    components: {
        Nav,
    },
};
</script>
