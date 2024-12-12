import { defineStore } from 'pinia'
import { ref } from 'vue'
import type { DbOption } from '../Types/DbOption.ts'

export const useIndustryStore = defineStore('industries', () => {
    const industries = ref<DbOption[] | null>(null)

    return { industries }
})
