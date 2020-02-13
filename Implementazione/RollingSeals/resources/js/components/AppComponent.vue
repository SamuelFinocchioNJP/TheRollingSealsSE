<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h1>Sono un componente e tonno</h1>
                        <div v-for="course in courses">
                            {{ course.nome }} <br>
                            {{ course.durata }} <br>
                            {{ course.tipologia }} <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "universities-component",
    mounted() {
        axios
            .get("http://localhost/RollingSeals/public/api/universities")
            .then(response => (this.courses = response.data ));
    },
    data() {
        return {
            test: "Dati a caso",
            courses: []
        };
    }
};
</script>
