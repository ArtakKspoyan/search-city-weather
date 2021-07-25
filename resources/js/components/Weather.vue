<template>
    <div>
        <h4 class="text-center">All Cites Weather</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>City</th>
                <th>Weather</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="info in infos" :key="info.id">
                <td>{{ info.id }}</td>
                <td>{{ info.user_id}}</td>
                <td>{{ info.name}}</td>
                <td>{{ info.weather}}</td>
                <td>{{ info.created_at }}</td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-info" @click="this.$router.push('/weather/add')">
            Add City Weather
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            infos: []
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/weather')
                .then(response => {
                    this.infos = response.data;
                })
                .catch(function (error) {
                    window.alert(error);
                });
        })
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
