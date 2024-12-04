<template>
    <nav class="p-4 flex justify-between shadow-md">
        <ul class="flex gap-4">
            <li>Home</li>
            <li>Search for job</li>
        </ul>
        <div class="flex gap-4">
            <Link href="/register-applicant">Register</Link>
        </div>
    </nav>
    <slot />
</template>

<script setup lang="ts"></script>

<style scoped></style>
