<template>
    <button class="btn" :disabled="disabled || loading" :class="[size && `btn-${size}`, variant && `btn-${variant}`, loading && 'loading']">
        <span class="btn-text">
            <slot />
        </span>
    </button>
</template>

<script setup lang="ts">
const {
    size = 'md',
    loading = false,
    disabled = false,
    variant = 'primary'
} = defineProps<{
    size?: 'xs' | 'sm' | 'md' | 'lg'
    loading?: boolean
    disabled?: boolean
    variant?: 'primary' | 'secondary' | 'outline'
}>()
</script>

<style lang="scss" scoped>
.btn {
    @apply rounded outline-none transition-colors duration-300;

    &.btn-lg {
        @apply py-4 px-2;
    }

    &.btn-md {
        @apply py-3 px-1.5;
    }

    &.btn-sm {
        @apply py-2 px-1;
    }

    &.btn-xs {
        @apply py-1 px-0.5;
    }

    &.loading {
        @apply text-white cursor-not-allowed relative;

        &:after {
            @apply content-[''] absolute top-0 bottom-0 left-0 right-0 w-6 h-6 m-auto border-2 border-transparent border-t-white rounded-full animate-spin;
        }

        .btn-text {
            @apply opacity-0 invisible;
        }
    }

    &.btn-primary {
        @apply bg-primary text-white;

        &:hover {
            @apply bg-red-600;
        }

        &[disabled],
        &disabled {
            @apply bg-red-300 cursor-not-allowed;
        }
    }

    &.btn-secondary {
        @apply bg-secondary text-white;

        &:hover {
            @apply bg-indigo-600;
        }

        &[disabled],
        &disabled {
            @apply bg-purple-300 cursor-not-allowed;
        }
    }

    &.btn-outline {
        @apply bg-white border-primary border text-primary;

        &:hover {
            @apply text-white bg-primary;
        }

        &[disabled],
        &disabled {
            @apply bg-gray-300 text-white cursor-not-allowed border-none;
        }
    }
}
</style>
