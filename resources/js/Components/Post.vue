<template>
    <div v-if="data.length > 0" v-for="post in data" :key="post.id"
        class="w-[200px] h-[300px] rounded overflow-hidden shadow-lg">
        <Link :href="route(namespace+'posts.show', post.slug)">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ post.title }}</div>
            <p class="text-gray-700 text-base">
            <div class="h-[150px] overflow-hidden" v-html="post.description"></div>
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{
                    parseDate(post.publication_date)
            }}</span>
        </div>
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
        components: {
        Link,
    },
    props: {
        data: {
            required: true,
        },
        namespace: {
            type: String,
        }
    },
    methods: {
        parseDate(value) {
            return value.split(' ')[0]; //get format date (yyyy-08-21)
        }
    }
}
</script>

<style scoped>
</style>