<template>
  <div>
    <div v-if="!complete">
      <!-- visible s'il y a encore des places de disponibles -->

      <transition name="slide-fade" mode="out-in">
        <section
          v-if="formulaire == 1 && confirmed == 0"
          :key="formulaire == 1 && confirmed == 0"
          id="formWindow"
          class="row justify-content-center"
        >
          <div v-if="fail">Il y a eu une erreur</div>

          <!-- début du formulaire -->

          <form
            url="/store"
            method="post"
            enctype="multipart/form-data"
            @submit.prevent="sendForm()"
          >
            <div class="contentForm row">
              <div class="col-sm-2 d-flex align-items-center">
                <div>
                  <label for="heure" class="m-sm-0 m-3">choissisez votre heure</label>

                  <select v-model="heure_id" name="heure" class="m-sm-0 m-3">
                    <option
                      v-for="(heure,index) in heures"
                      :key="index"
                      :value="heure.id"
                      :disabled="heure.taken== 1"
                    >{{heure.heure}}</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-1"></div>
              <div class="col-sm-4 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                  <label for="name" class="m-3">Nom :</label>
                  <input v-model="name" required type="text" name="name" class="m-3" />
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <label for="forname" class="m-3">Prénom :</label>
                  <input required type="text" v-model="forname" name="forname" class="m-3" />
                </div>
              </div>
              <div class="col-sm-5 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center">
                  <label for="mail" class="m-3">Email :</label>
                  <input required type="email" v-model="mail" name="mail" class="m-3" />
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <label for="mail" class="m-3">Number :</label>
                  <input required type="tel" v-model="phone" name="phone" class="m-3" />
                </div>
              </div>
            </div>
            <div class="newsletterChecForm">
              <input
                @click="Newsletter()"
                type="checkbox"
                :checked="newsletter == 1"
                name="newsletter"
              />
              <p>Voulez vous vous inscrire à la newsletter ?</p>
            </div>
            <div class="row">
              <div class="col-sm-12 m-3">
                <button type="submit" class="rounded btn-blue p-2">
                  <h4 class="m-0">Réserver</h4>
                </button>
              </div>
            </div>
          </form>
        </section>
        <!-- boutton d entrée du formulaire  -->
        <div v-else-if="formulaire == 0 && confirmed == 0" :key="formulaire == 0 && confirmed == 0">
          <button v-on:click="showForm" id="btn-link" class="btn btn-blue">Réserver votre séance</button>
        </div>

        <!-- fin du formulaire apres reservation -->

        <div v-else-if="formulaire == 0 && confirmed == 1" :key="formulaire == 0 && confirmed == 1">
          <h3 class="text-success">Vous avez réservé votre séance</h3>
        </div>
      </transition>
    </div>
    <!-- fin du formulaire -->

    <!-- Div visible si le formulaire est complet -->

    <div v-else class="d-flex justify-content-center align-items-center">
      <div class="bg-white box-message row">
        <div class="col-12">
          <div>
            <h3 class="text-center">La session du {{session}} est malheureusement complète</h3>
          </div>
          <div class="mt-3">
            <p
              class="text-center m-0"
            >Pour connaitre la date de la prochaine session n,hésitez pas à vous inscrire à notre newsletter</p>
          </div>
          <transition name="opacity-out" mode="out-in">
            <form
              v-if="!RegisteredNewsletter"
              class="p-3 box-shadow-none"
              action="/newsletter"
              method="post"
              @submit.prevent="RegisterNewsletter()"
            >
              <div class="row">
                <div class="col-12">
                  <div class="d-flex justify-content-center">
                    <input
                      requiered
                      type="email"
                      v-model="mailnewsletter"
                      value="mail"
                      name="mail"
                      placeholder="Veuillez inscrire votre email ici"
                      class="w-75 mt-1"
                    />
                  </div>
                  <div class="m-3">
                    <button class="btn btn-blue rounded" type="submit">S'inscrire a la newsletter</button>
                  </div>
                </div>
              </div>
            </form>
            <div v-else class="d-flex align-items-center justify-content-center">
              <h3 class="text-success">{{RegisteredMessage}}</h3>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      formulaire: false,
      confirmed: false,
      heure_id: "",
      heures: "",
      mail: "",
      name: "",
      forname: "",
      phone: "",
      session: "",
      newsletter: true,
      fail: false,
      complete: false,
      mailnewsletter: "",
      RegisteredNewsletter: false,
      RegisteredMessage: "",
    };
  },
  methods: {
    showForm: function () {
      this.formulaire = true;
    },
    sendForm: function () {
      axios
        .post("/store", {
          heure_id: this.heure_id,
          mail: this.mail,
          name: this.name,
          forname: this.forname,
          phone: this.phone,
          newsletter: this.newsletter,
        })
        .then((response) => {
          console.log(response.data);
          this.confirmed = true;
          this.formulaire = false;
        })
        .catch(function (error) {
          this.fail = true;
          console.log(error);
        });
    },
    Newsletter: function () {
      this.newsletter = !this.newsletter;
    },
    // s enregistrer a la newsletter
    RegisterNewsletter: function () {
      axios
        .post("/newsletter", {
          mailnewsletter: this.mailnewsletter,
        })
        .then((response) => {
          this.RegisteredNewsletter = true;
          this.RegisteredMessage = response.data;
        })
        .catch(function (error) {});
    },
  },
  mounted() {
    axios.get("/heures").then((response) => {
      this.heures = response.data[0];
      this.complete = response.data[1];
      this.session = response.data[2].date;
    });
  },
};
</script>

<style lang="sass">
.slide-fade-enter-active
  transition: all .3s ease

.slide-fade-leave-active
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0)

.slide-fade-enter, .slide-fade-leave-to
  transform: translateX(100px)
  opacity: 0
.opacity-out-enter-active
  transition: all .3s ease

.opacity-out-leave-active
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0)

.opacity-out-enter, .slide-fade-leave-to
  opacity: 0
</style>
