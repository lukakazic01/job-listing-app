<template>
    <nav class="p-4 flex justify-between shadow-md bg-primary">
        <ul class="flex gap-4 text-white">
            <li>Početna</li>
            <li>Pretraga</li>
        </ul>
        <div class="flex gap-4">
            <div class="relative group">
                <span class="text-white">Registruj se</span>
                <div class="absolute top-6 right-0 hidden shadow-md bg-white group-hover:flex rounded flex-col w-80">
                    <Link class="p-2 hover:bg-secondary rounded-t hover:text-white" href="/register-applicant">Kao aplikant</Link>
                    <Link class="p-2 hover:bg-secondary rounded-b hover:text-white" href="/register-job-poster">Kao kompanija</Link>
                </div>
            </div>
        </div>
    </nav>
    <slot />
</template>

<script setup lang="ts"></script>

<style scoped></style>
