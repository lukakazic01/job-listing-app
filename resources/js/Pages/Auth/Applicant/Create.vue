<template>
    <div class="mt-10">
        <div class="flex flex-col gap-6 mx-auto max-w-sm">
            <BaseInput placeholder="Email" label="Email" />
            <BaseInput placeholder="Password" type="password" label="Password" />
            <BaseButton class="w-full">Submit</BaseButton>
        </div>
    </div>
</template>

<script setup>
import BaseInput from '../../../Shared/Base/BaseInput.vue'
import BaseButton from '../../../Shared/Base/BaseButton.vue'
</script>

<style scoped></style>
