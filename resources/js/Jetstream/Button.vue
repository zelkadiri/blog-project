<script setup>
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    href: {},
});

function redirect() {
    if (!this.href) {
        return;
    }

    event.preventDefault();
    this.$inertia.visit(this.href);

}
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <Link :href="href" >
                <slot />
        </Link>

    </button>
</template>
