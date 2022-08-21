<template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <h1 class="text-lg mb-5" v-html="post.title"></h1>
                    <div v-html="post.description">

                    </div>

                    <p>{{post.publication_date}}</p>
                </div>
            </div>
        </div>

</template>

<script>

export default {
    components: {
       

    },
    props: {
        post: {}
    }
}
</script>

<style scoped>
</style>