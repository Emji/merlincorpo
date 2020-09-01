<template>
  <div>
    <transition name="slide-fade" mode="out-in">
      <div
        v-if="formulaire == 1 && confirmed == 0"
        :key="formulaire == 1 && confirmed == 0"
        id="formWindow"
        @submit.prevent="sendForm()"
        class="row justify-content-center"
      >
        <div v-if="fail">Il y a eu une erreur</div>
        <form url="/store" method="post" enctype="multipart/form-data">
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
                <h4 class="m-0">Reserver</h4>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div v-else-if="formulaire == 0 && confirmed == 0" :key="formulaire == 0 && confirmed == 0">
        <button v-on:click="showForm" id="btn-link" class="btn btn-blue">Reserver votre séance</button>
      </div>
      <div v-else-if="formulaire == 0 && confirmed == 1" :key="formulaire == 0 && confirmed == 1">
        <h3 class="text-success">Vous avez reservé votre séance</h3>
      </div>
    </transition>
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
      newsletter: true,
      fail: false,
    };
  },
  methods: {
    showForm: function () {
      this.formulaire = true;
    },
    sendForm: function () {
      axios
        .post("/store")
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
  },
  mounted() {
    axios.get("/heures").then((response) => {
      this.heures = response.data;
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
</style>
