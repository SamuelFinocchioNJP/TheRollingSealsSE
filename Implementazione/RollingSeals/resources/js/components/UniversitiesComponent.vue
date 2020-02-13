<template>
    <section>
        <div class="row">
            <div v-for="university in universities">
                <div class="col s3">
                    <div class="card">
                        <div class="card-image">
                            <img src="https://picsum.photos/200/300/">
                            <span class="card-title">
                                {{ university.nome }}
                            </span>
                        </div>
                        <div class="card-content">
                            <p>
                                {{ university.citta }} <br />
                                {{ university.indirizzo }} <br />
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="#"> View courses </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    mounted() {
        axios
            .get("http://localhost/RollingSeals/public/api/universities")
            .then(response => (this.universities = response.data));
    },
    data() {
        return {
            universities: []
        };
    }
};
</script>
