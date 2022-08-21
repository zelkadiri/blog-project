<template>
    <AppLayout title="Posts" active="blog">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class=" pt-12 bg-grey-light rounded-md w-full">
                <ol class="list-reset flex">
                    <li>
                        <Link :href="route('admin.posts.index')">Posts</Link>
                    </li>
                    <li><span class="text-gray-500 mx-2">&gt;</span></li>
                    <li>
                        <Link :href="route('dashboard')">Your Posts</Link>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="space-y-5">
                    <JetButton :href="route('admin.posts.create')">Add new post</JetButton>
                    <h2 class="text-2xl font-semibold leading-tight mb-5">Posts</h2>
                    <div class="flex gap-5 flex-wrap ">
                        <!-- all posts -->
                       <Post :data="posts.data" namespace="admin."/>

                        <div v-if="posts.data.length == 0">
                            Create your first post !
                        </div>
                    </div>
                    <!-- pagination -->
                    <Pagination :prevUrl="posts.links.prev" :nextUrl="posts.links.next" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue'
import Pagination from '@/Components/Pagination.vue';
import Post from '@/Components/Post.vue';
export default {
    components: {
        Pagination,
        JetButton,
        Link,
        AppLayout,
        Post,
    },
    props: {
        posts: {},
    },
    
}



</script>

<style scoped>
</style>