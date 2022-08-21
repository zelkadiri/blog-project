<template>
    <AppLayout title="Posts" active="blog">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add new post
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="space-y-5">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                        <form @submit.prevent="savePost" class="w-full">
                            <div class="space-y-5">
                                <div>
                                    <Label for="title" value="Title" />
                                    <Input class="w-full" name="title" id="title" type="text" v-model="form.title"
                                        autocomplete="title" />
                                    <InputError />
                                </div>
                                <div>
                                    <Label for="slug" value="Slug" />
                                    <Input class="w-full" name="slug" id="slug" type="text" v-model="form.slug"
                                        autocomplete="slug" />
                                    <InputError />
                                </div>
                                <div>
                                    <Label name="description" for="description" value="Description" />
                                    <QuillEditor  v-model:content="form.description" contentType="html" theme="snow" toolbar="essential" />
                                    <!-- <textarea class="w-full" id="description" v-model="form.description"
                                        autocomplete="description" /> -->
                                    <textareaError />
                                </div>

                                <ActionMessage :on="form.recentlySuccesful">
                                    Saved.
                                </ActionMessage>
                                <Button type="submit" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">Save</Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Label from '../../../Jetstream/Label.vue';
import Input from '../../../Jetstream/Input.vue';
import InputError from '../../../Jetstream/InputError.vue';
import ActionMessage from '../../../Jetstream/ActionMessage.vue';
import Button from '../../../Jetstream/Button.vue';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
export default {
    components: {
        AppLayout,
        Link,
        Label,
        Input,
        InputError,
        ActionMessage,
        Button,
        QuillEditor,
    },
    data() {
        return {
            form: this.$inertia.form({
                "_method": 'POST',
                title: '',
                slug: '',
                description: '',
            },
                {
                    resetOnSuccess: false,
                }
            ),
        }
    },

    methods: {
        slugify(string) {
            return string.toString()
                .replace(/&&+/g, "&")
                .replace(/&+/g, "and")
                .replace(/\s+/g, "-")
                .replace(/[^\w\-]+/g, "")
                .replace(/--+/g, "-")
                .toLowerCase()
                .trim()
        },
        savePost() {
            this.form.post(route('admin.posts.store'))
        }
    },
    watch: {
        "form.title"(title) {
            this.form.slug = this.slugify(title)
        },
    },
}


</script>

<style scoped>
</style>