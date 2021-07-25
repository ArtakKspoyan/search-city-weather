<template>
    <div>
        <h4 class="text-center">Add City Weather</h4>
        <div class="row">
            <div class="col-md-6">
                     <loader object="#ff9633"
                        color1="#ffffff"
                        color2="#17fd3d"
                        size="5"
                        speed="2"
                        bg="#343a40"
                        objectbg="#999793"
                        opacity="80"
                        v-show="shouldShow"
                        name="circular">
                </loader>
                <form @submit.prevent="addWeather">
                    <div class="form-group select-city">
                        <label>City</label>
                        <vue-google-autocomplete
                            id="map2"
                            ref="toAddress"
                            classname="form-control"
                            placeholder="Start typing"
                            v-on:placechanged="getFromAddress"
                            v-model="info.address"
                            types="(cities)"
                            country="us"
                        >
                        </vue-google-autocomplete>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Weather</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import VueGoogleAutocomplete  from 'vue-google-autocomplete';
import loader from "vue-ui-preloader/src/components/loader";
export default {
    components: {
        VueGoogleAutocomplete,
        loader,
    },
    data() {
        return {
            shouldShow: false,
            info: {},
        }
    },


    mounted: function () {
        this.$refs.toAddress.focus();
    },
    methods: {
        getFromAddress: function (from_address, placeResultData, id) {
            this.info.address = from_address;

        },
        addWeather() {
            this.shouldShow = true;
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/weather/add', this.info)
                    .then(response => {
                        this.$router.push({name:'info'})
                        this.shouldShow = false;
                        window.alert(response);
                    })
                    .catch(response => {
                        this.shouldShow = false;
                        window.alert(response);
                    });
            })
        }

    },

    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>


