<template>
    <div class="container mx-auto px-4 py-12">
        <div class="flex flex-col items-center space-y-6 mt-4">
            <!-- Sort post by date -->
            <SortByDate :data="posts.data"/>
            <div class="flex justify-between gap-5 flex-wrap ">
                <!-- all posts -->
                <Post :data="posts.data" namespace=""/>
            </div>
            <!-- pagination -->
            <Pagination :prevUrl="posts.links.prev" :nextUrl="posts.links.next" />
        </div>

    </div>
</template>

<script>
import Pagination from '@/Components/Pagination.vue';
import Post from '@/Components/Post.vue';
import SortByDate from '@/Components/SortByDate.vue';
export default {
    components: {
        Pagination,
        Post,
        SortByDate ,
    },
    props: {
        posts: {},
    },
}
</script>

<style  scoped>
</style>