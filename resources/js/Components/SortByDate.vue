<template>
    <div class="flex flex-col items-center gap-4">
        <p>Sort by </p>
        <div class="flex gap-5 ">
            <JetButton @click="sortDate('new')">Newest</JetButton>
            <JetButton @click="sortDate('old')">Oldest</JetButton>
        </div>
    </div>
</template>

<script>
import JetButton from '@/Jetstream/Button.vue';

export default {
    components: {
        JetButton,
    },
    props: {
        data: {},
    },
    methods: {
        
        sortDate(value) {
            let saveData = this.data;
            if (value == "new") {
                this.data = saveData.sort((a, b) => (a.publication_date < b.publication_date ? 1 : -1))
            }
            if (value == "old")
                this.data = saveData.sort((a, b) => (a.publication_date > b.publication_date ? 1 : -1))
        }
    },
}
</script>

<style lang="scss" scoped>
</style>