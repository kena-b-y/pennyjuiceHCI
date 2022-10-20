<template>
  <Nav />

  <main>
    <section class="section-childcare-hero">
      <div class="childcare-hero">
        <div class="childcare-hero-text-box">
          <h1 class="childcare-heading-primary">
            Premium Quality 100% Fruit Juice Concentrate. No Sugar Added. Non
            Refrigerated
          </h1>
          <p class="childcare-hero-description">
            We're a family-owned business that was founded in 2001. We have over
            40 years of experience in the beverage industry.
          </p>
          <router-link to="/products" class="btn btn--full margin-right-sm"
            >Order Now</router-link
          >
        </div>
        <div class="childcare-hero-img-box">
          <img
            class="childcare-hero-img"
            src="../.././assets/user/assets/img/childcare-hero.jpg"
            alt="A picture with different fruits"
          />
        </div>
      </div>
    </section>

    <section class="section-childcare-info">
      <div class="container center-text">
        <div class="childcare-info-box">
          <div class="childcare-info-text-box">
            <p class="childcare-info-description">
              Get delicious and nutritious 100% fruit juice from Penny Juice of
              America. We provide 100% blended fruit juice concentrates that are
              specially made for kids and meet all the requirements of the FDA
              with regard to subsidy and nutrition. Customers prefer our
              products for their benefits, features, variety, service, and
              competitive pricing.
              <br />
              <br />
              These blended fruit juice concentrates are for all childcare
              centers and preschools. Penny Juice of America uses only the
              highest quality fruit juice products.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-about" id="sectionabout">
      <div class="container">
        <span class="subheading">More on our products</span>
        <h2 class="heading-secondary">Why we are your right choice</h2>
      </div>

      <div class="container grid grid--2-cols grid--center-v">
        <div class="step-img-box">
          <img
            src="../.././assets/user/assets/img/juices.jpg"
            alt="small boy with multiple glasses of different juices"
            class="step-img"
          />
        </div>
        <div class="step-text-box">
          <h3 class="heading-tertiary">
            Get Juice Concentrates in a Variety of Flavors
          </h3>
          <p class="step-description">
            Kids love penny juice concentrates because it’s available in various
            exciting flavors and colors. Each case contains six half-gallon
            bottles of different flavors.
          </p>
          <ul class="list">
            <li>No contracts</li>
            <li>Free delivery nationwide</li>
            <li>Minimum order 1 case</li>
          </ul>
        </div>

        <div class="step-text-box">
          <h3 class="heading-tertiary">Easy-To-Make Juice Concentrates</h3>
          <p class="step-description">
            Prepare all flavors using seven parts water and one part juice
            concentrate. You don’t need to refrigerate the concentrate before or
            after opening it.
            <br />
            <br />
            Reduce cost per ounce, storage and handling requirements.
          </p>
        </div>
        <div class="step-img-box">
          <img
            src="../.././assets/user/assets/img/img-1.jpg"
            alt="Fruits in water"
            class="step-img"
          />
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
          <router-link to="https://www.facebook.com/PENNYJUICE/">
            <i class="fab fa-facebook-f"></i
          ></router-link>
          <router-link
            to="https://twitter.com/1PENNYJUICE?ref_src=twsrc%5Etfw%7Ctwcamp%5Eembeddedtimeline%7Ctwterm%5Eprofile%3A1PENNYJUICE%7Ctwgr%5EeyJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3NlbnNpdGl2ZV9tZWRpYV9pbnRlcnN0aXRpYWxfMTM5NjMiOnsiYnVja2V0IjoiaW50ZXJzdGl0aWFsIiwidmVyc2lvbiI6bnVsbH0sInRmd190d2VldF9yZXN1bHRfbWlncmF0aW9uXzEzOTc5Ijp7ImJ1Y2tldCI6InR3ZWV0X3Jlc3VsdCIsInZlcnNpb24iOm51bGx9fQ%3D%3D&ref_url=https%3A%2F%2Fwww.pennyjuice.com%2F"
          >
            <i class="fab fa-twitter"></i
          ></router-link>
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
